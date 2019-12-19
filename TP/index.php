<?php
$partNb = 9;
$exerciseNb = 'TP';
include '../header.php';
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
$earliestYear = 1900;
$chosenMonthDays = '';
$firstDay = '';
$months = ['', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
if (isset($_GET['month'])) {
    $month = $_GET['month'];
} else {
    $month = date('n');
}
?>
<!-- Form to select the month and the year you want -->
<form method="get" action="index.php">
    <select name="month">
        <option value="1">Janvier</option>
        <option value="2">Février</option>
        <option value="3">Mars</option>
        <option value="4">Avril</option>
        <option value="5">Mai</option>
        <option value="6">Juin</option>
        <option value="7">Juillet</option>
        <option value="8">Août</option>
        <option value="9">Septembre</option>
        <option value="10">Octobre</option>
        <option value="11">Novembre</option>
        <option value="12">Décembre</option>
    </select>
    <?php
    // Create a <select> with an option for each year between the current one and the one defined in the variable $earliestYear
    echo ('<select name="year">');
    foreach (range(date('Y'), $earliestYear) as $userChoice) {
        echo ('<option value="' . $userChoice . '">' . $userChoice . '</option>');
    }
    echo ('</select>');
    ?>
    <input type="submit" value="C'est parti !"/>
</form>
<div class="w-100 p-2"></div>
<h2><?php
    if ((isset($_GET['month'])) & (isset($_GET['year']))) {
        echo ($months[$month] . ' ' . $_GET['year']);
    }
    ?></h2>
<div class="container-fluid rounded bg-secondary flex-column justify-content-around">
    <div class="ml-5 mr-1 mt-3 row">
        <div class="dayLabel text-center"><p>Lundi</p></div>
        <div class="dayLabel text-center"><p>Mardi</p></div>
        <div class="dayLabel text-center"><p>Mercredi</p></div>
        <div class="dayLabel text-center"><p>Jeudi</p></div>
        <div class="dayLabel text-center"><p>Vendredi</p></div>
        <div class="dayLabel text-center"><p>Samedi</p></div>
        <div class="dayLabel text-center"><p>Dimanche</p></div>
    </div>
    <div class="ml-5 mr-1 mb-3 row">
        <?php
        // If the month and the year have been transmitted through the form
        if ((isset($_GET['month'])) & (isset($_GET['year']))) {
            // Define the number of days in the month chosen by the user
            $chosenMonthDays = cal_days_in_month(CAL_GREGORIAN, $_GET['month'], $_GET['year']);
            // Define a string with the first day of the month, for instance: 'tuesday 1 september 1992'
            $firstDay = strftime('%A %e %B %Y', strtotime('01-' . $_GET['month'] . '-' . $_GET['year']));
            // Become the value of the month defined by the user
            $month = $_GET['month'];
            // Create an array which begin from 1 and extend to the number of days defined by $chosenMonthDays
            $monthLength = range(1, $chosenMonthDays);
// Create empty cells, regarding the name of the first day detected in $firstDay
            if (strpos($firstDay, 'mardi') !== false) {
                echo '<div class="emptyCell text-center"></div>';
            } elseif (strpos($firstDay, 'mercredi') !== false) {
                echo '<div class="emptyCell text-center"></div><div class="emptyCell text-center"></div>';
            } elseif (strpos($firstDay, 'jeudi') !== false) {
                echo '<div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div>';
            } elseif (strpos($firstDay, 'vendredi') !== false) {
                echo '<div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div>';
            } elseif (strpos($firstDay, 'samedi') !== false) {
                echo '<div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div>';
            } elseif (strpos($firstDay, 'dimanche') !== false) {
                echo '<div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div>';
            }

            foreach ($monthLength as $monthDays) {
                echo '<div class="calendarCell text-center">' . $monthDays . '</div>';
            }
        }
        ?>
    </div>
</div>
<?php
include '../footer.php';
