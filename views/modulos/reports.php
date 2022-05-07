<?php


require_once "../../controllers/reports.controller.php";
require_once "../../models/reports.model.php";
require_once "../../controllers/products.controller.php";
require_once "../../models/products.model.php";

require_once "../../controllers/users.controller.php";
require_once "../../models/users.model.php";

require_once "../../controllers/visits.controller.php";
require_once "../../models/visits.model.php";



$report = new ControllerReports();

$report->ctrUnloadReport();