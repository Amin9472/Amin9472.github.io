<!DOCTYPE html>
<html lang="en">

<?php
require_once("assist/dbconnection.php")
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Sarin</title>
</head>

<body class="bg_color">
    .
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <form action="result.php" method="post">
                    <?php
                    $query = "SELECT * FROM `questions`";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $query1 = "SELECT `value1`,`value2`,`value3`,`value4`,`value5`,`value6`,`value7`,`value8`,`value9` FROM `values_questions` AS v JOIN `questions` AS q ON v.question_id=q.question_id ";
                    $stmt1 = $conn->prepare($query1);
                    $stmt1->execute();
                    $result1 = $stmt1->get_result();
                    $res1 = $result1->fetch_all();

                    $i = 0;
                    $j = -1;
                    while ($res = $result->fetch_assoc()) {
                        $j++;
                        $i++;
                    ?>
                        <div class="card" style="width: 25rem; height:25rem;" id="<?php echo $i; ?>">
                            <div class="card-body">
                                <span id="error"></span>
                                <p class="card-text"><?php echo $res["question"]; ?></p>

                                <?php
                                if ($res["option9"] != "") {
                                ?>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="<?php echo $i; ?>" value="<?php echo $res1[$j][8]; ?>" id="radio9">

                                        <label class="form-check-label">
                                            <?php echo $res["option9"] ?>
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                if ($res["option8"] != "") {
                                ?>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="<?php echo $i; ?>" value="<?php echo $res1[$j][7]; ?>" id="radio8">

                                        <label class="form-check-label">
                                            <?php echo $res["option8"] ?>
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                if ($res["option7"] != "") {
                                ?>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="<?php echo $i; ?>" value="<?php echo $res1[$j][6]; ?>" id="radio7">

                                        <label class="form-check-label">
                                            <?php echo $res["option7"] ?>
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                if ($res["option6"] != "") {
                                ?>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="<?php echo $i; ?>" value="<?php echo $res1[$j][5]; ?>" id="radio6">

                                        <label class="form-check-label">
                                            <?php echo $res["option6"] ?>
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                if ($res["option5"] != "") {
                                ?>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="<?php echo $i; ?>" value="<?php echo $res1[$j][4]; ?>" id="radio5">

                                        <label class="form-check-label">
                                            <?php echo $res["option5"] ?>
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                if ($res["option4"] != "") {
                                ?>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="<?php echo $i ?>" value="<?php echo $res1[$j][3]; ?>" id="radio4">

                                        <label class="form-check-label">
                                            <?php echo $res["option4"] ?>
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                if ($res["option3"] != "") {
                                ?>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="<?php echo $i ?>" value="<?php echo $res1[$j][2]; ?>" id="radio3">

                                        <label class="form-check-label">
                                            <?php echo $res["option3"] ?>
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="<?php echo $i ?>" value="<?php echo $res1[$j][1]; ?>" id="radio2">
                                    <label class="form-check-label">
                                        <?php echo $res["option2"] ?>
                                    </label>
                                </div>

                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="<?php echo $i ?>" value="<?php echo $res1[$j][0]; ?>" id="radio1">
                                    <label class="form-check-label">
                                        <?php echo $res["option1"]; ?>
                                    </label>
                                </div>




                                <a class="btn btn-primary position-absolute bottom-0 start-0 mx-2 mb-2" name="previous" id="previous">Previous</a>
                                <a class="btn btn-primary position-absolute bottom-0 end-0 mx-2 mb-2" name="next" id="next">Next</a>
                                <button class="btn btn-primary position-absolute bottom-0 end-0 mx-2 mb-2" type="submit" name="submit" style="display: none;" id="submit">submit</button>

                            </div>

                        </div>
                    <?php
                    }
                    ?>
                    <!--div class="card" style="width: 25rem; height:25rem;">
                        <div class="card-body">
                        <button class="btn btn-primary position-absolute bottom-0 end-0 mx-2 mb-2" type="submit" name="submit" style="display: none;" id="submit">submit</button>
                        </div>
                    </!--div-->
                </form>
            </div>
        </div>
    </div>
</body>
<script src="Script/index.js"></script>

</html>