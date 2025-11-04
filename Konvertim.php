	<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konvertues Monedhash</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Konvertues Monedhash</h1>
    <form method="POST">
        <label for="shuma">Shuma:</label>
        <input type="number" step="0.01" name="shuma" id="shuma" required>

        <label for="monedha">Zgjidh monedhën:</label>
        <select name="monedha" id="monedha" required>
            <option value="EUR">Euro (EUR)</option>
            <option value="USD">Dollar Amerikan (USD)</option>
            <option value="GBP">Paund Britanik (GBP)</option>
            <option value="CHF">Frangë Zvicerane (CHF)</option>
            <option value="JPY">Jen Japonez (JPY)</option>
        </select>

        <label for="kursi">Kursi i këmbimit (në Lek):</label>
        <input type="number" step="0.01" name="kursi" id="kursi" required>

        <button type="submit" name="submit">Konverto</button>
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $shuma = $_POST['shuma'];
        $kursi = $_POST['kursi'];
        $monedha = $_POST['monedha'];

        if(is_numeric($shuma) && $shuma > 0 && is_numeric($kursi) && $kursi > 0) {
            $lek = $shuma * $kursi;
            echo "<div class='result'>{$shuma} {$monedha} është e barabartë me " . number_format($lek, 2) . " Lekë (me kursin {$kursi} për {$monedha}).</div>";
        } else {
            echo "<div class='result' style='color: red;'>Ju lutem vendosni vlera pozitive dhe të vlefshme për shumën dhe kursin.</div>";
        }
    }
    ?>
</div>

</body>
</html>
