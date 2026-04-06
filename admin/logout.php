<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/admin/logout');
ns_admin_logout();
header('Location: ' . ns_href('/admin/login'));
exit;
