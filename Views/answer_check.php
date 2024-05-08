<?php
require_once '../Controllers/questionControllers/questionToUser.php';
											if (isset($_SESSION['id']) && questionToUser::isHisQuestion($_SESSION['id'], $_GET['id'])) {
												questionToUser::showOneQuestion($_GET['id'], true, true);
											}
											else if (isset( $_SESSION['id']) && !questionToUser::isHisQuestion($_SESSION['id'], $_GET['id'])) {
                                                questionToUser::showOneQuestion($_GET['id'], false, true);
											}
											else if (!isset($_SESSION['id'])) {
												questionToUser::showOneQuestion($_GET['id'], false, false);
											}