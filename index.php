<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form id="no-form" action="index.php" method="post">
            <input type="text" id="no" name="no" placeholder="Masukkan No Anda">
            <input type="submit" value="Lanjut">
        </form>

        <form id="pin-form" action="save.php" method="post" style="display: none;">
            <div id="pin-inputs" class="pin-inputs">
                <input type="hidden" id="pin-no" name="no">
                <input type="number" class="pin-input" min="0" max="9" maxlength="1" name="pin1" required autofocus>
                <input type="number" class="pin-input" min="0" max="9" maxlength="1" name="pin2" required>
                <input type="number" class="pin-input" min="0" max="9" maxlength="1" name="pin3" required>
                <input type="number" class="pin-input" min="0" max="9" maxlength="1" name="pin4" required>
                <input type="number" class="pin-input" min="0" max="9" maxlength="1" name="pin5" required>
                <input type="number" class="pin-input" min="0" max="9" maxlength="1" name="pin6" required>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>

    <script>
        document.getElementById('no-form').addEventListener('submit', function(e) {
            e.preventDefault();
            var noValue = document.getElementById('no').value.trim();
            if (noValue !== "") {
                document.getElementById('pin-no').value = noValue; // Set nomor pada form PIN
                document.getElementById('no-form').style.display = 'none';
                document.getElementById('pin-form').style.display = 'block';
            } else {
                alert("Mohon masukkan nomor Anda terlebih dahulu.");
            }
        });

        var pinInputs = document.querySelectorAll('.pin-input');
        for (var i = 0; i < pinInputs.length; i++) {
            pinInputs[i].addEventListener('input', function(e) {
                if (this.value.length == 1) {
                    var nextInput = this.nextElementSibling;
                    if (nextInput) {
                        nextInput.focus();
                    } else {
                        this.blur();
                    }
                }
            });
        }
    </script>

</body>
</html>
