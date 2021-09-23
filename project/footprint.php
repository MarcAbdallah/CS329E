<?php
    session_start();
    if (!isset($_SESSION['loggedin'])){
        $url = "./login.php";
        header("Location: $url");
    }
?>

<!DOCTYPE html>

<html><head>
    <title>Green Team</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./base.css">
    <link rel="stylesheet" href="./footprint.css">
</head>
<body class="vsc-initialized">
    <div id="banner">
        <div id="green-team">My Carbon Footprint</div>
        <div id="class-name">CS329E Summer 2021</div>
        <a href="./homepage.html">
            <img id="logo" src="./GTlogo.png" alt="GTlogo">
        </a>
        <div id="background-banner"></div>
    </div>
    
    <div id="navigation">
        <div id="footprint" class="nav" onclick="location.href='./footprint.php'">My Carbon Footprint</div>
        <div id="ocean" class="nav" onclick="location.href='./ocean.html'">Ocean Pollution</div>
        <div id="ice" class="nav" onclick="location.href='./ice.html'">Ice Sheets</div>
        <div id="urban" class="nav" onclick="location.href='./heatislands.html'">Urban Heat Islands</div>
        <div id="animal-plant" class="nav" onclick="location.href='./aplife.html'">Animal/Plant Life</div>
        <div id="human-health" class="nav" onclick="location.href='./humanhealth.html'">Human Health</div>
    </div>

    <div id="main">
        <div id="definition" class="grid-item">
            <h2>What is a carbon footprint?</h2>
            <p class="content">Everybody has a carbon footprint. A carbon footprint is the amount of 
                carbon dioxide an entity releases into the environment. These emissions are caused by
                the use of fossil fuels. Corporations also have carbon footprints as well. The carbon footprints
                of corporations are significantly higher than that of an individual. It is best for the environment
                to keep your carbon footprint as low as possible.
            </p>
        </div>

        <div id="form" class="grid-item">
            <h2>Answer the following questions to estimate your carbon footprint</h2>
            <button onclick="load()" class="button">Load Your Data</button>
            <button onclick="save()" class="button">Save Your Results</button><br><br>
            <form id="footprintform" onsubmit="calculate(event)" action="" method="GET">
                <label for="electricity">How much electricity do you use?</label><br>
                <input name="electricity" id="electricity" type="range" min="0" max="8000" value="5000"><span id="elec_value"></span>
                <p><em>You can find this information using your latest electricity bill</em></p><br>

                <label for="gas">How much gas do you use?</label><br>
                <input name="gas" id="gas" type="range" min="0" max="30000" value="20000"><span id="gas_value"></span>
                <p><em>You can find this information using your latest gas bill</em></p><br>

                <label for="mpg">Enter your car's fuel efficiency and 12-month car mileage</label><br>
                <input name="mpg" id="mpg" type="range" min="1" max="60" value="30"><span id="mpg_value"></span><br>
                <input name="miles" id="miles" type="range" min="0" max="15000" value="9000"><span id="miles_value"></span><br><br>
                <input type="submit" value="Submit"><br><br>
                <a href="./login.php">Switch Users</a>
            </form>
        </div>

        <div id="result" class="grid-item">
            <h2>Your Carbon Footprint</h2>
            <h3>Electric:</h3>
            <p class="content" id="elec_result">-- tonnes CO2</p>
            <h3>Gas:</h3>
            <p class="content" id="gas_result">-- tonnes CO2</p>
            <h3>Car:</h3>
            <p class="content" id="car_result">-- tonnes CO2</p>
            <h3>Total:</h3>
            <p class="content" id="total">-- tonnes CO2</p><br>
            <h4>Average Annual Carbon Footprints of World's Largest Corporations</h4>
            <em><a href="https://www.visualcapitalist.com/companies-carbon-emissions/">From 1965-2017</a></em>
            <table class="content">
                <tr>
                    <td>Chevron: 833 MtCO2e</td>
                    <td>Exxon Mobile: 805 MtCO2e</td>
                </tr>
                <tr>
                    <td>British Petroleum: 654 MtCO2e</td>
                    <td>Shell: 614 MtCO2e</td>
                </tr>
            </table>
            <p>MtCO2e: Megatonnes of CO2 equivalent</p>
        </div>

        <script src="footprint.js"></script>
    </div>

</body></html>