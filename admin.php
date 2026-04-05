<?php

declare(strict_types=1);

require_once __DIR__ . '/config/bootstrap.php';

header('Location: ' . ns_href('/admin'), true, 301);
exit;
