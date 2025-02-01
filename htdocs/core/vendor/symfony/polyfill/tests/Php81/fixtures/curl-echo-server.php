<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$output = $_FILES;
foreach ($_FILES as $name => $file) {
    if (is_string($file['tmp_name'] ?? null)) {
        unset($file['tmp_name'], $file['full_path']);
        $output[$name] = $file;
    }
}
echo json_encode($output);
