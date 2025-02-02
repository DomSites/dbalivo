<?php return array (
  0 => 
  array (
    'GET' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/favicon.ico' => 
      array (
        'methods' => 'GET',
        'routes' => 
        array (
          0 => '/favicon.ico',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/favicon',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'HEAD' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'POST' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'PUT' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'DELETE' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'TRACE' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'OPTIONS' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'CONNECT' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'PATCH' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'PROPFIND' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'PROPPATCH' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'MKCOL' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'COPY' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'MOVE' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'LOCK' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
    'UNLOCK' => 
    array (
      '/my-drive/api' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/api[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/api',
      ),
      '/my-drive/wopi' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/wopi[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/wopi',
      ),
      '/my-drive/shares' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/shares[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
        'method' => 'handleRoute',
        'short' => '/shares',
      ),
      '/my-drive/ocs-provider' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs-provider[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs-provider',
      ),
      '/my-drive/ocs' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/ocs[{optional:.+}]',
        ),
        'class' => 'Pydio\\OCS\\OCSPlugin',
        'method' => 'startServer',
        'short' => '/ocs',
      ),
      '/my-drive/public' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/public/{hash}/dl/[{optional:.+}]',
          1 => '/public/{hash}',
          2 => '/public[{optional:.+}]',
        ),
        'class' => 'Pydio\\Share\\ShareCenter',
        'path' => 'plugins/action.share/src/ShareCenter.php',
        'method' => 'publicRoute',
        'short' => '/public',
      ),
      '/my-drive/' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/index' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/dashboard' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/settings' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/welcome' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
      '/my-drive/ws-' => 
      array (
        'methods' => '*',
        'routes' => 
        array (
          0 => '/',
          1 => '/index[{optional:.+}]',
          2 => '/dashboard[{optional:.+}]',
          3 => '/settings[{optional:.+}]',
          4 => '/welcome[{optional:.+}]',
          5 => '/ws-[{optional:.+}]',
        ),
        'class' => 'Pydio\\Core\\Http\\Base',
        'method' => 'handleRoute',
        'short' => '/',
      ),
    ),
  ),
  1 => 
  array (
    'GET' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/user/reset\\-password/([^/]+)()()|/my\\-drive/shares(.+)()()()|/my\\-drive/ocs\\-provider(.+)()()()()|/my\\-drive/ocs(.+)()()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => 'GET',
              'routes' => 
              array (
                0 => '/user/reset-password/{key}',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/user',
            ),
            1 => 
            array (
              'key' => 'key',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
        ),
      ),
      1 => 
      array (
        'regex' => '~^(?|/my\\-drive/public/([^/]+)|/my\\-drive/public(.+)()|/my\\-drive/index(.+)()()|/my\\-drive/dashboard(.+)()()()|/my\\-drive/settings(.+)()()()()|/my\\-drive/welcome(.+)()()()()()|/my\\-drive/ws\\-(.+)()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'HEAD' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'POST' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'PUT' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'DELETE' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'TRACE' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'OPTIONS' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'CONNECT' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'PATCH' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'PROPFIND' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'PROPPATCH' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'MKCOL' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'COPY' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'MOVE' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'LOCK' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
    'UNLOCK' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/my\\-drive/api(.+)|/my\\-drive/wopi(.+)()|/my\\-drive/shares(.+)()()|/my\\-drive/ocs\\-provider(.+)()()()|/my\\-drive/ocs(.+)()()()()|/my\\-drive/public/([^/]+)/dl/()()()()()|/my\\-drive/public/([^/]+)/dl/(.+)()()()()()|/my\\-drive/public/([^/]+)()()()()()()()|/my\\-drive/public(.+)()()()()()()()()|/my\\-drive/index(.+)()()()()()()()()()|/my\\-drive/dashboard(.+)()()()()()()()()()()|/my\\-drive/settings(.+)()()()()()()()()()()()|/my\\-drive/welcome(.+)()()()()()()()()()()()()|/my\\-drive/ws\\-(.+)()()()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/api[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/api',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/wopi[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/wopi',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/shares[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Dav\\DAVServer',
              'method' => 'handleRoute',
              'short' => '/shares',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs-provider[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs-provider',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/ocs[{optional:.+}]',
              ),
              'class' => 'Pydio\\OCS\\OCSPlugin',
              'method' => 'startServer',
              'short' => '/ocs',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
              'optional' => 'optional',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'hash' => 'hash',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/public/{hash}/dl/[{optional:.+}]',
                1 => '/public/{hash}',
                2 => '/public[{optional:.+}]',
              ),
              'class' => 'Pydio\\Share\\ShareCenter',
              'path' => 'plugins/action.share/src/ShareCenter.php',
              'method' => 'publicRoute',
              'short' => '/public',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'methods' => '*',
              'routes' => 
              array (
                0 => '/',
                1 => '/index[{optional:.+}]',
                2 => '/dashboard[{optional:.+}]',
                3 => '/settings[{optional:.+}]',
                4 => '/welcome[{optional:.+}]',
                5 => '/ws-[{optional:.+}]',
              ),
              'class' => 'Pydio\\Core\\Http\\Base',
              'method' => 'handleRoute',
              'short' => '/',
            ),
            1 => 
            array (
              'optional' => 'optional',
            ),
          ),
        ),
      ),
    ),
  ),
);