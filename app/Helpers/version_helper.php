<?php

// app/Helpers/version_helper.php
use CodeIgniter\CodeIgniter;

/**
 * Returns CodeIgniter's version.
 */
function ci_version(): string
{
    return "The Framework Version is: ". CodeIgniter::CI_VERSION;
}