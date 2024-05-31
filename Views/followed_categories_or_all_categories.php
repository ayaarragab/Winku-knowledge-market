<?php
												if (isset($_SESSION['id'])) {
                                                    if (isset($_SESSION['adminOrNot'])) {
                                                        echo '<h4 class="widget-title">Categories</h4>';
                                                        echo '<ul class="naves">';
                                                        foreach ($categories as $category) {
                                                            echo '<li><a href="subcategories.php?adminOrNot=1&categoryId='.intval($category['id']).'">'.$category['name'].'</a></li>';
                                                        }                                                 
                                                    }
                                                    elseif (!isset($_SESSION['adminOrNot'])){
                                                        echo '<h4 class="widget-title">Followed categories</h4>';
                                                        echo '<ul class="naves">';
                                                        $categories = CategoryusersMapper::getUserFollowedCategories($_SESSION['id']);
                                                        if ($categories) {
                                                            foreach ($categories as $category) {
                                                                echo '<li><a href="subcategories.php?categoryId=' . $category['id'] . '">' . $category['name'] . '</a></li>';
                                                            }
                                                        }
														else{
															echo "<li>You've not followed any categories yet.</li>";
														}                                                    
													}
												}
												else {
													echo '<h4 class="widget-title">Categories</h4>';
													echo '<ul class="naves">';
													$categories = CategoryMapper::selectall();
													if ($categories) {
														foreach ($categories as $category) {
															// echo '<li><a href="subcategories.php?categoryId=' . $category['id'] . '">' . $category['name'] . '</a></li>';
															echo '<li><a href="landing.php">' . $category['name'] . '</a></li>';
													}}
													else{
														echo 'All categories have been deleted';
													}
												}
												?>											
											</ul>