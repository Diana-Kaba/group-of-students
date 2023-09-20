<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Група студентів</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1, h2 {
            text-align: center;
        }

        p {
            font-size: 18px;
        }

        div {
            margin: 0 auto;
            background-color: #F5F5F5;
            max-width: 600px;
            padding: 5px 20px 20px 20px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        div:hover {
            background-color: #fff;
            border: 1px solid lightgrey;
        }
    </style>
</head>
<body>
    <h1>Група студентів</h1>
    <?php
$students = [
    [
        "name" => "Joan",
        "surname" => "Joanson",
        "year" => 2005,
        "marks" => [
            "PHP" => 4,
            "JS" => 3,
            "HTML" => 5,
        ],
    ],
    [
        "name" => "Jack",
        "surname" => "Smith",
        "year" => 2003,
        "marks" => [
            "PHP" => 3,
            "JS" => 3,
            "HTML" => 4,
        ],
    ],
    [
        "name" => "Martin",
        "surname" => "Miller",
        "year" => 2004,
        "marks" => [
            "PHP" => 4,
            "JS" => 3,
            "HTML" => 5,
        ],
    ],
];

function try_walk($val, $key, $data)
{
    $sumOfMarks = 0;
    foreach ($val["marks"] as $mark) {
        $sumOfMarks += $mark;
    }
    $averageOfMarks = round($sumOfMarks / count($val["marks"]), 1);

    echo "\t<p lang=\"en\">$data{$val['name']} {$val['surname']} ({$val['year']}): $averageOfMarks.</p>\n";
}

function cmp_name($a, $b)
{
    return $a["name"] <=> $b["name"];
}
uasort($students, "cmp_name");
echo "\n\t<div><h2>uasort()[name]:</h2>\n";
array_walk($students, "try_walk", "Student - ");
echo "</div>";

function cmp_surname($a, $b)
{
    return $a["surname"] <=> $b["surname"];
}
uasort($students, "cmp_surname");
echo "\n\t<div><h2>uasort()[surname]:</h2>\n";
array_walk($students, "try_walk", "Student - ");
echo "</div>";

function cmp_year($a, $b)
{
    return $a["year"] <=> $b["year"];
}
uasort($students, "cmp_year");
echo "\n\t<div><h2>uasort()[year]:</h2>\n";
array_walk($students, "try_walk", "Student - ");
echo "</div>";

function cmp_marks($a, $b)
{
    $sumOfMarksA = 0;
    foreach ($a["marks"] as $markA) {
        $sumOfMarksA += $markA;
    }
    $averageOfMarksA = round($sumOfMarksA / count($a["marks"]), 1);

    $sumOfMarksB = 0;
    foreach ($b["marks"] as $markB) {
        $sumOfMarksB += $markB;
    }
    $averageOfMarksB = round($sumOfMarksB / count($b["marks"]), 1);
    return $averageOfMarksA <=> $averageOfMarksB;
}
uasort($students, "cmp_marks");
echo "\n\t<div><h2>uasort()[marks]:</h2>\n";
array_walk($students, "try_walk", "Student - ");
echo "</div>";
?>
</body>
</html>