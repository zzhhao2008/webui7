<?php
Router::any("/", "index");
Router::any("index", "index");
Router::any("login", "user/login");
Router::any("logout", "user/logout");
Router::any("register", "user/register");
Router::any("lock-screen", "user/lock");
Router::any("profile", "user/profile");
Router::any("doc", "md");
Router::any("buttons", "buttons");
Router::any("typography", "typography");
Router::any("mdi", "mdi");
Router::any("forms", "forms");
Router::any("table", "tables");
Router::any("chartjs", "charts");