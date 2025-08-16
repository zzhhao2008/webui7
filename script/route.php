<?php
Router::any("/", "index");
Router::any("index", "index");
Router::any("login", "user/login");
Router::any("logout", "user/logout");
Router::any("register", "user/register");
Router::any("lock-screen", "user/lock");
Router::any("profile", "user/profile");
Router::any("doc", "md");