<?php

function getPokerHandWinner($input) {
    // regular expression to check the format
    // ex: D4C4C8D8S4

    if  (!preg_match("/([SHDC]([2-9]|[JQKA])){5}/", $input) || strlen($input) > 10) {
        echo "Wrong input format.";
        return;
    }else {
        $arr = str_split($input, 2);
        if  (empty($arr)) {
            echo "Something went wrong. Please try again!";
            return;
        }

        $duplicate = false;
        // Check if there was a duplicate value in the input
        foreach(array_count_values($arr) as $value => $count) {
            if ($count > 1) {
                $duplicate = true;
                break;
            }
        }

        if ($duplicate) {
            echo "There was duplicate value. Please try again!";
            return;
        }

        // Match ranks from input
        if (!preg_match_all("/([2-9]|[JQKA])/", $input, $matches, PREG_PATTERN_ORDER)) {
            return;
        }
        // Get all the ranks from input
        $ranks = array_count_values($matches[0]);
        $result = ['pair' => 0, 'rank' => 0];

        foreach($ranks as $value => $count) {
            if ($count == 2) {
                $result['pair']++;
            }

            if ($count == 3) {
                $result['rank'] = $count;
            }

            if ($count == 4) {
                $result['rank'] = $count;
            }
        }
        
        if  ($result['pair'] == 1) {
            if ($result['rank'] == 3) {
                echo 'FH';
            } else {
                echo '1P';
            }
        } else if ($result['pair'] == 2) {
            echo '2P';
        } else if ($result['rank'] == 3) {
            echo '3C';
        } else if ($result['rank'] == 4) {
            echo '4C';
        } else {
            echo "Your input does'nt match any result";
        }   
    }
}

?>