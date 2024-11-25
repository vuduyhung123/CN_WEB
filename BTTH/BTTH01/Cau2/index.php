<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trắc nghiệm vui</title>
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
?>

<body class="bg-light py-5">
    <div class="container">
        <h1 class="text-center text-primary mb-5">Trắc nghiệm vui</h1>
        <form action="submit.php" method="POST" class="shadow p-4 bg-white rounded">
            <?php foreach ($questionsList as $index => $question): ?>
                <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <strong><?php echo $question[0]; ?></strong>
                    </div>
                    <div class="card-body">
                        <?php 
                            $options = ['A', 'B', 'C', 'D'];
                            for ($i = 1; $i <= 4; $i++):
                        ?>
                            <div class="form-check mb-2">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="question<?php echo $index + 1; ?>" 
                                    value="<?php echo $options[$i - 1]; ?>" 
                                    id="question<?php echo $index + 1; ?><?php echo $options[$i - 1]; ?>"
                                >
                                <label class="form-check-label" for="question<?php echo $index + 1; ?><?php echo $options[$i - 1]; ?>">
                                    <?php echo $question[$i]; ?>
                                </label>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Nộp bài</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
