<?php
Router::any("/", "index");
Router::any("index.aspx", "index");
Router::any("login", "user/login");
Router::any("logout", "user/logout");
Router::any("register", "user/register");
Router::any("lock-screen", "user/lock");