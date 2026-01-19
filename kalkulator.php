<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
</head>
<body>

    <h1>Kalkulator sederhana</h1>

    <form method="post">
        <input type="number" name="angka1" placeholder="Angka pertama" required>
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="angka2" placeholder="Angka kedua" required>
        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
        if (isset($_POST['hitung'])) {
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $operator = $_POST['operator'];

            switch ($operator) {
                case '+':
                    $hasil = $angka1 + $angka2;
                    break;
                case '-':
                    $hasil = $angka1 - $angka2;
                    break;
                case '*':
                    $hasil = $angka1 * $angka2;
                    break;
                case '/':
                    if ($angka2 != 0) {
                        $hasil = $angka1 / $angka2;
                    } else {
                        $hasil = 'Tidak dapat membagi dengan nol!';
                    }
                    break;
                default:
                    $hasil = 'Operator tidak valid!';
            }

            echo "<h2>hasil adalah : $hasil</h2>";
        }
    ?>

</body>
</html>
