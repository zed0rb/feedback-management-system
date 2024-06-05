<?php

require_once 'config/config_session.php';
session_unset();
session_destroy();
header('Location: login.php');
exit;