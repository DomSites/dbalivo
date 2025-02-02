'use strict';

// Get options from JSON file.
let form_config_element = document.querySelector("meta[name='ssp-config-path']");

if (null !== form_config_element) {
    let config_path = form_config_element.getAttribute("content");
    let config_url = window.location.origin + config_path + 'forms.json';

    function submitForm(url, settings, data) {
        // Send data via fetch to URL
        fetch(url, {
            method: "POST",
            body: data
        }).then(response => {
            if (response.ok) {
                handleMessage(settings);
            }
        }).catch(error => {
            if (error.message.includes('Failed to fetch')) {
                handleMessage(settings, false);
            } else {
                handleMessage(settings, true);
            }
        });
    }

    function manageForm(config_url, form_id, form) {
        fetch(config_url)
            .then(response => {
                if (!response.ok) {
                    throw new Error("HTTP error " + response.status);
                }
                return response.json();
            })
            .then(json => {
                let settings = json.find(x => x.form_id === form_id);

                console.log(settings);

                if (settings) {
                    let data = new FormData(form);
                    submitForm(settings.form_webhook, settings, data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function handleMessage(settings, error = false) {
        if (settings.form_use_redirect) {
            window.location.replace(settings.form_redirect_url);
        } else {
            // Set up success message.
            const message = document.createElement('div');

            if (error) {
                message.innerHTML = settings.form_error_message;
                message.style.cssText = 'width: 100%; background-color: #e24b4b; color: white; text-align: center; padding: 10px;';
            } else {
                message.innerHTML = settings.form_success_message;
                message.style.cssText = 'width: 100%; background-color: #58b348; color: white; text-align: center; padding: 10px;';
            }

            // Append success message to form.
            let form = document.getElementById(settings.form_id);

            form.appendChild(message);

            // Adjust the form output depending on the plugin.
            let spinner;

            switch (settings.form_plugin) {
                case 'cf7':
                    spinner = document.querySelector('.wpcf7-spinner');
                    spinner.style.display = 'none';
                    break;
                case 'elementor_forms':
                    spinner = document.querySelector('.elementor-message');
                    spinner.style.display = 'none';
                    break;
                case 'gravity_forms':
                    spinner = document.querySelector('.gform-loader');
                    spinner.style.display = 'none';
                    break;
            }

            setTimeout(() => {
                message.remove();
            }, 5000);
        }
    }

    function modifyFormAttributes(form) {
        form.removeAttribute("action");
        form.removeAttribute("method");
        form.removeAttribute("enctype");
        form.removeAttribute("novalidate");
    }

    document.addEventListener("DOMContentLoaded", function () {
        const allForms = document.querySelectorAll(
            ".wpcf7 form, .wpcf7-form, .gform_wrapper form, .wpforms-container form, .elementor-form, .wsf-form, .frm-fluent-form"
        );

        allForms.forEach((form) => {
            modifyFormAttributes(form);

            // Inputs
            const inputs = form.querySelectorAll("input");

            // Add HTML required attribute
            inputs.forEach((input) => {
                if (input.getAttribute("aria-required") === "true") {
                    input.required = true;
                }
            });

            form.addEventListener("submit", function (el) {
                el.preventDefault();

                let form_id;

                if (form.className.includes('wpcf7-form')) {
                    // Check if its Contact Form 7.
                    form_id = form.parentNode.id;
                } else if (form.className.includes('wpforms-form')) {
                    // Check if its WP Forms.
                    form_id = form.getAttribute('id');
                } else if (form.className.includes('wsf-form')) {
                    // Check if its WS Form.
                    form_id = form.getAttribute('id');
                } else if (form.parentNode.className.includes('gform_wrapper')) {
                    // Check if its Gravity Forms.
                    form_id = form.getAttribute('id');
                } else if (form.className.includes('frm-fluent-form')) {
                    // Check if its Fluent Forms.
                    form_id = form.getAttribute('id');
                } else if (form.className.includes('elementor-form')) {
                    // Check if its Elementor Forms.
                    form_id = form.querySelector("[name='form_id']").value;
                }

                // Manage and submit form.
                manageForm(config_url, form_id, form);
            });
        });
    });
}