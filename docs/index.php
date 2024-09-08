<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lamp Controller Web</title>

    <script type="text/javascript">
        function ubahStatus(statusValue) {
            let statusRelay = document.getElementById("statusRelay");

            if (statusValue == true)
            {
                statusValue = "1";
                statusRelay.innerHTML = "ON";
            }
            else
            {
                statusValue = "0";
                statusRelay.innerHTML = "OFF";
            }

            // simpan di local storage
            localStorage.setItem("relay", statusValue);

            // kirim data dari local storage ke server
            fetch('saverelay.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'relay=' + encodeURIComponent(localStorage.getItem("relay"))
                })
                .then(response => response.text())
                .then(data => console.log('Server Response:', data))
                .catch(error => console.error('Error:', error));
        }

        function ubahPosisi(posisiValue) {
            document.getElementById("posisiServo").innerHTML = posisiValue;
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="text-align: center; padding-top: 20px">
        <h2>Kontrol Relay dan Servo <br> NodeMCU ESP8266 & Bootstrap <br> PHP & MySQL</h2>
    </div>

    <!-- tampilan kartu -->
    <div class="container" style="display: flex; justify-content: center; gap: 10px; padding-top: 20px;">
        <!-- kartu relay -->
        <div class="card mb-3" style="width: 20rem;">
            <div class="card-header" style="font-size: 30px; text-align: center; background-color: red; color: white;">Relay</div>
            <div class="card-body">

                <!-- switch -->
                <div class="form-check form-switch" style="font-size: 50px;">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" onchange="ubahStatus(this.checked)">
                    <label class="form-check-label" for="flexSwitchCheckChecked"> <span id="statusRelay"> OFF </span> </label>
                </div>
            </div>
            <!-- end switch -->

        </div>
        <!-- end kartu relay -->

        <!-- kartu servo -->
        <div class="card mb-3" style="width: 20rem;">
            <div class="card-header" style="font-size: 30px; text-align: center; background-color: blue; color: white;">Servo</div>
            <div class="card-body">

                <!-- slider -->
                <div style="text-align: center; font-size: 18px;">
                    <label for="customRange1" class="form-label">Posisi Servo <span id="posisiServo"> 0 </span> Derajat</label>
                    <input type="range" class="form-range" id="customRange1" min="0" max="180" step="1" value="0" onchange="ubahPosisi(this.value)">
                </div>
                <!-- end slider -->

            </div>
        </div>
        <!-- end kartu servo -->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>