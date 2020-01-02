<?php
$partNb = 9;
$exerciseNb = 'TP';
include '../header.php';
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
// The earliest year selectable will be 200 years in the past from the current one
$earliestYear = date('Y') - 200;
// The furthest year selectable will be 50 years in the futur from the current one
$furthestYear = date('Y') + 50;
// Default month and year will be the current ones
$month = date('n');
$year = date('Y');
$months = ['', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
// If the month has been specified through the form, $month will become this value
if (isset($_GET['month'])) {
    $month = $_GET['month'];
}
// If the year has been specified through the form, $year will become this value
if (isset($_GET['year'])) {
    $year = $_GET['year'];
}
// Define the number of days in the month chosen by the user
$chosenMonthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
// Define a string with the first day of the month, for instance: 'tuesday 1 september 1992'
$firstDay = strftime('%A %e %B %Y', strtotime('01-' . $month . '-' . $year));
// Define a string with the last day of the month
$lastDay = strftime('%A %e %B %Y', strtotime($chosenMonthDays . '-' . $month . '-' . $year));
// Create an array which begin from 1 and extend to the number of days defined by $chosenMonthDays
$monthLength = range(1, $chosenMonthDays);
?>
<!-- Form to select the month and the year you want -->
<form method="get" action="index.php">
    <label for="month">Sélectionnez un mois :</label>
    <select id="month" name="month">
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
    <label for="year">et une année :</label>
    <select id="year" name="year">
        <?php
        // Create an option for each years between $furthestYear and $earliestYear
        foreach (range($furthestYear, $earliestYear) as $userChoice) {
            echo ('<option value="' . $userChoice . '">' . $userChoice . '</option>');
        }
        ?>
    </select>
    <input type="submit" value="C'est parti !"/>
</form>
<div class="w-100 p-2"></div>
<h2><?php echo ($months[$month] . ' ' . $year); ?></h2>
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
            echo '<div class="calendarCell text-center font-italic font-weight-bold"><p class="ml-5 mt-2">' . $monthDays . '</p></div>';
        }
// Create empty cells, regarding the name of the last day detected in $lastDay
        if (strpos($lastDay, 'samedi') !== false) {
            echo '<div class="emptyCell text-center"></div>';
        } elseif (strpos($lastDay, 'vendredi') !== false) {
            echo '<div class="emptyCell text-center"></div><div class="emptyCell text-center"></div>';
        } elseif (strpos($lastDay, 'jeudi') !== false) {
            echo '<div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div>';
        } elseif (strpos($lastDay, 'mercredi') !== false) {
            echo '<div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div>';
        } elseif (strpos($lastDay, 'mardi') !== false) {
            echo '<div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div>';
        } elseif (strpos($lastDay, 'lundi') !== false) {
            echo '<div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div><div class="emptyCell text-center"></div>';
        }
        ?>
    </div>
</div>
<?php
include '../footer.php';
