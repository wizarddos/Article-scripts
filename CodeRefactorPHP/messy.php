    <?php
    // Main code
    $h = $_POST['h'];
    $i = $_POST['i'];

    if ($h > 0) {
        $h = $i * $h;

        if ($h > 100) {
            echo "Total is greater than 100!";
        } else {
            echo "Total is less than or equal to 100!";
        }
    } else {
        echo "Invalid quantity!";
    }

    $j = array("Apple", "Banana", "Orange");

    if ($h > 0) {
        if ($i > 0) {
            if ($i < 10) {
                if ($h < 10) {
                    if ($h > 100) {
                        echo "Total is greater than 100!";
                    } else {
                        echo "Total is less than or equal to 100!";
                    }
                } else {
                    echo "Quantity is greater than or equal to 10!";
                }
            } else {
                echo "Price is greater than or equal to 10!";
            }
        } else {
            echo "Invalid price!";
        }
    } else {
        echo "Invalid quantity!";
    }

    if (is_array($j)) {
        if (count($j) > 0) {
            foreach ($j as $k) {
                echo $k . "<br>";
            }
        } else {
            echo "No items to print!";
        }
    } else {
        echo "Invalid items!";
    }

?>
