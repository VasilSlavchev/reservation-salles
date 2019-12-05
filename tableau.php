<?php

function isdateok($heurecasebegin, $heurecaseend, $lecturebdd) {
    $k = 0;
    while ( $k < sizeof($lecturebdd) ) {
        $datecasebegin=date('H:i:s', strtotime($heurecasebegin));
        $datecaseend=date('H:i:s', strtotime($heurecaseend));
        $DateBegin = date('H:i:s', strtotime($lecturebdd[$k][4]));
        $DateEnd = date('H:i:s', strtotime($lecturebdd[$k][6]));

        if (($datecasebegin == $DateBegin) || ($datecaseend == $DateEnd)) {
            echo "is between";
        }
        else {
            echo "NO GO!";  
        }
        $k++;
    }
}

$i = 0;
$j = 0;
while ( $i < 11 ) {
?>
    <tr>
        <?php
        while ($j < 6) {
            if ( $j == 0 ) {
        ?>
            <td class="cheures">
            <?php
                if ($i == 0) {
                    echo "08h00 - 09h00";
                }
                elseif ($i == 1) {
                    echo "09h00 - 10h00";
                }
                elseif ($i == 2) {
                    echo "10h00 - 11h00";
                }
                elseif ($i == 3) {
                    echo "11h00 - 12h00";
                }
                elseif ($i == 4) {
                    echo "12h00 - 13h00";
                }
                elseif ($i == 5) {
                    echo "13h00 - 14h00";
                }
                elseif ($i == 6) {
                    echo "14h00 - 15h00";
                }
                elseif ($i == 7) {
                    echo "15h00 - 16h00";
                }
                elseif ($i == 8) {
                    echo "16h00 - 17h00";
                }
                elseif ($i == 9) {
                    echo "17h00 - 18h00";
                }
                elseif ($i == 10) {
                    echo "18h00 - 19h00";
                }
            }
            ?>
            </td>
            <?php
            if ( $j > 0 ) {
            ?>
            <td>
            <?php
                if ( $j == 3 ) {
                    if ( $i == 0 ) {
                        isdateok("08:00:00", "09:00:00", $resultat);
                    }
                    if ( $i == 1 ) {
                        isdateok("09:00:00", "10:00:00", $resultat);
                    }
                    if ( $i == 2 ) {
                        isdateok("10:00:00", "11:00:00", $resultat);
                    }
                    if ( $i == 3 ) {
                        isdateok("11:00:00", "12:00:00", $resultat);
                    }
                    if ( $i == 4 ) {
                        $k = 0;
                        while ( $k < sizeof($resultat) ) {
                            if ( $resultat[$k][4] == "12" ) {
                                echo $resultat[$k][1];
                            }
                            $k++;
                        }
                    }
                    if ( $i == 5 ) {
                        $k = 0;
                        while ( $k < sizeof($resultat) ) {
                            if ( $resultat[$k][4] == "13" ) {
                                echo $resultat[$k][1];
                            }
                            $k++;
                        }
                    }
                    if ( $i == 6 ) {
                        $k = 0;
                        while ( $k < sizeof($resultat) ) {
                            if ( $resultat[$k][4] == "14" ) {
                                echo $resultat[$k][1];
                            }
                            $k++;
                        }
                    }
                    if ( $i == 7 ) {
                        $k = 0;
                        while ( $k < sizeof($resultat) ) {
                            if ( $resultat[$k][4] == "15" ) {
                                echo $resultat[$k][1];
                            }
                            $k++;
                        }
                    }
                    if ( $i == 8 ) {
                        $k = 0;
                        while ( $k < sizeof($resultat) ) {
                            if ( $resultat[$k][4] == "16" ) {
                                echo $resultat[$k][1];
                            }
                            $k++;
                        }
                    }
                    if ( $i == 9 ) {
                        $k = 0;
                        while ( $k < sizeof($resultat) ) {
                            if ( $resultat[$k][4] == "17" ) {
                                echo $resultat[$k][1];
                            }
                            $k++;
                        }
                    }
                    if ( $i == 10 ) {
                        $k = 0;
                        while ( $k < sizeof($resultat) ) {
                            if ( $resultat[$k][4] == "18" ) {
                                echo $resultat[$k][1];
                            }
                            $k++;
                        }
                    }
                }
                ?>
                </td>
            <?php
            }
            $j++;
        }
        $j = 0;
        $i++;
}