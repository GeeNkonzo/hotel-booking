<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
</head>
<body>
    <section class="grid-container">
        <header>
            <div class="top-grid">
                <div class="logo">
                    <img src="../img/logo.png">
                </div>
                <div class="greetings">
                    <h1>Hello User!</h1>
                </div>
                <div class="logout">
                    <button class="btn">Log Out</button>
                </div>
            </div>
        </header>
        <main>

            <h1>Find affordable accommodation in Cape Town.</h1>
            
                <form action="">
                    <div class="form-grid">
                        <div>
                            <label>Hotel:</label>
                            <select id="hotel">
                                <option value="1">hotel1</option>
                                <option value="2">hotele2</option>
                                <option value="3">motel3</option>
                                <option value="4">beenbee4</option>
                            </select> 
                        </div>

                        <div>
                            <label>Check in date:</label>
                                <input type="date" id="start" name="arrival" min="2018-01-01" max="2020-12-31">
                        </div>
                        <div>
                            <label>Check out date:</label>
                                <input type="date" id="end" name="leave" min="2018-01-01" max="2020-12-31">
                        </div>
                    </div>
                </form>

            

            <!-- <div class="gallery-grid">
                <div class="item1"></div>
                <div class="item2"></div>
                <div class="item3"></div>
                <div class="item4"></div>
                <div class="item5"></div>
                <div class="item6"></div>
                <div class="item7"></div>
                <div class="item8"></div>
            </div> -->
        </main>
        
        <footer>footer</footer>
    </section>
</body>
</html>