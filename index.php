<?php
	session_start();

	require_once "controllers/template.controller.php";

	require_once "controllers/administrators.controller.php";

	require_once "controllers/banner.controller.php";

	require_once "controllers/categories.controller.php";

	require_once "controllers/commerce.controller.php";

	require_once "controllers/messages.controller.php";

	require_once "controllers/products.controller.php";

	require_once "controllers/sales.controller.php";

	require_once "controllers/slider.controller.php";

	require_once "controllers/users.controller.php";

	require_once "controllers/visits.controller.php";

	require_once "controllers/subCategories.controller.php";

	require_once "controllers/header.controller.php";

	require_once "controllers/notifications.controller.php";


	require_once "models/administrators.model.php";

	require_once "models/banner.model.php";

	require_once "models/categories.model.php";

	require_once "models/commerce.model.php";

	require_once "models/messages.model.php";

	require_once "models/products.model.php";

	require_once "models/products.model.php";

	require_once "models/sales.model.php";

	require_once "models/slider.model.php";

	require_once "models/users.model.php";

	require_once "models/visits.model.php";

	require_once "models/route.php";

	require_once "models/subCategories.model.php";

	require_once "models/header.model.php";

	require_once "models/notifications.model.php";

	$template = new ControllerTemplate();

	$template-> template();

