<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
    $filename = "questions.txt";
    $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $current_question = [];
    foreach ($questions as $line) {
        if (strpos($line, "Câu") === 0) {
            if (!empty($current_question)) {
                $questionsList[] = $current_question;
            }
            $current_question = [];
        }
        $current_question[] = $line;
    }
    if (!empty($current_question)) {
        $questionsList[] = $current_question;
    }

    $answers = [];
    foreach ($questionsList as $question) {
        $answers[] = trim(substr($question[5], strpos($question[5], ":") + 1));
    }

    $score = 0;
    foreach ($_POST as $key => $userAnswer) {
        $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
        if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
            $score++;
        }
    }
?>

<body class="bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="text-primary fw-bold">Kết quả trắc nghiệm</h1>
        </div>

        <div class="card shadow-lg mx-auto" style="max-width: 600px;">
            <div class="card-body text-center">
                <h3 class="text-success fw-bold">Chúc mừng!</h3>
                <p class="fs-5 mt-3">
                    Bạn đã trả lời đúng 
                    <span class="fw-bold text-primary fs-3"><?php echo $score; ?></span>
                    / 
                    <span class="fw-bold text-dark fs-3"><?php echo count($answers); ?></span> 
                    câu hỏi.
                </p>
                <p class="text-muted fst-italic">
                    Cố gắng hơn lần sau nhé!
                </p>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="index.php" class="btn btn-primary btn-lg">
                <i class="bi bi-arrow-repeat"></i> Làm lại
            </a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
