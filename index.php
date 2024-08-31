<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LootMar LLC Courses</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    
    <style>
        /* Houdini */
        @property --blink-opacity {
            syntax: "<number>";
            inherits: false;
            initial-value: 1;
        }

        @keyframes blink-animation {
            0%,
            100% {
                opacity: var(--blink-opacity, 1);
            }
            50% {
                opacity: 0;
            }
        }

        /* Base */
        :root {
            font-family: Inter, sans-serif;
            --stripe-color: #fff;
            --bg: var(--stripe-color);
            --maincolor: var(--bg);
        }

        body {
            width: 100cqw;
            min-height: 100cqh;
            display: flex;
            place-content: center;
            place-items: flex-start center;
            background: var(--bg);
            background-attachment: fixed; /* Fixed background */
        }

        /* Custom */
        @keyframes smoothBg {
            from {
                background-position: 50% 50%, 50% 50%;
            }
            to {
                background-position: 350% 50%, 350% 50%;
            }
        }
        #course-list {
            background: #ffd5d5;
            padding: 2rem;
            border-radius: 1rem;
        }

        .wrapper {
            width: 100%;
            height: auto;
            position: relative;
        }

        .hero {
            width: 100%;
            height: 100%;
            min-height: 100vh;
            position: relative;
            display: flex;
            place-content: center;
            place-items: center;
            --stripes: repeating-linear-gradient(
                100deg,
                var(--stripe-color) 0%,
                var(--stripe-color) 7%,
                transparent 10%,
                transparent 12%,
                var(--stripe-color) 16%
            );

            --rainbow: repeating-linear-gradient(
                100deg,
                #60a5fa 10%,
                #e879f9 15%,
                #60a5fa 20%,
                #5eead4 25%,
                #60a5fa 30%
            );
            background-image: var(--stripes), var(--rainbow);
            background-size: 300%, 200%;
            background-position: 50% 50%, 50% 50%;
            filter: blur(10px) invert(100%);
            mask-image: radial-gradient(ellipse at 100% 0%, black 40%, transparent 70%);
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: var(--stripes), var(--rainbow);
            background-size: 200%, 100%;
            animation: smoothBg 60s linear infinite;
            background-attachment: fixed;
            mix-blend-mode: difference;
        }

        .content {
            position: absolute;
            margin-top: 150px;
            inset: 0;
            width: 100%;
            height: 100%;
            display: flex;
            place-content: center;
            place-items: center;
            flex-flow: column;
            gap: 4.5%;
            text-align: center;
            mix-blend-mode: difference;
            filter: invert(1);
        }

        .h1--scalingSize {
            font-size: calc(1rem - -3vw);
            position: relative;
        }

        /* Icon Houdini */
        .icon {
            width: 1lh;
            height: 1lh;
            aspect-ratio: 1/1;
            padding: 0.25em 0.35rem;
            border-radius: calc(1px / 0);
            border: 1px dashed;
            --blink-opacity: 1;
            animation: blink-animation 2s ease-in-out infinite running;
        }

        /* Challenge */
        .h1--scalingSize::before {
            content: attr(data-text);
            position: absolute;
            inset: 0;
            background: white;
            text-shadow: 0 0 1px #ffffff;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            background-color: white;
            -webkit-mask: linear-gradient(#000 0 0) luminance;
            mask: linear-gradient(#000 0 0) luminance, alpha;
            backdrop-filter: blur(19px) brightness(12.5);
            -webkit-text-stroke: 1px white;
            display: flex;
            margin: auto;
            z-index: 1;
            pointer-events: none;
        }
    </style>
</head>
<body class="wrapper">
    <div class="hero">
    </div>
    <div class="content">
    <div class="container " style="margin-top: 300px;">
    <h1 class="display-1 text-center h1--scalingSize" data-text="Welcome to LootMar LLC">Welcome to LootMar LLC</h1>
            <p class="lead text-center">We offer a 70% discount for all our courses. Check out our offerings below:</p></div>
                    <ul id="course-list" class="list-group mb-5"><!-- Courses will be populated here by PHP --></ul>
                </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        var courses = <?php echo json_encode([

    ['name' => 'DevOps Mastery: Because Your CI/CD Pipeline Should Be Perfect', 
     'price' => 65, 'desc' => 'Take your DevOps skills to the next level with this comprehensive guide to pipeline perfection'],
    ['name' => 'AI for Humans (Not Just Developers): A Guide to Not Getting Replaced', 
     'price' => 55, 'desc' => 'Stay ahead of the AI curve with this guide to understanding and working with artificial intelligence'],
    ['name' => 'Containerization: The Fun Way to Run Your Apps (No, Really)', 
     'price' => 60, 'desc' => 'Learn how to containerize your apps with this fun and easy-to-follow guide'],
    ['name' => 'Penetration Testing for Non-Punks: How to Break Stuff without Going to Jail', 
     'price' => 80, 'desc' => 'Learn the art of penetration testing with this comprehensive guide to breaking into (and out of) systems'],
    ['name' => 'From Script Kiddie to CTF Master: A Journey through the Dark Side', 
     'price' => 100, 'desc' => 'Take your hacking skills from script kiddie to master with this expert guide to CTF competitions'],
       ]); ?>;  
        
        function populateCourseList() {
            const courseListElement = document.getElementById("course-list");
            
            courses.forEach(function(course) {
                let row = document.createElement("div");
                row.className = "row mb-5";  
                
                // Create course details column
                let colDetails = document.createElement('div');
                colDetails.className = 'col-12'; 
                colDetails.innerHTML = `<h2>${course.name}</h2><p>Price: ${(course.price * 0.7).toFixed(2)}$ (was: ${course.price}$)</p>`;
                
                // Create course button column
                let colButton = document.createElement('div');
                colButton.className = 'col-12 text-right'; 
                
                // Create a button element and set its attributes
                let buyButton = document.createElement('button');
                buyButton.innerText = "Buy Now at Cheap Price";
                buyButton.className = 'btn btn-primary';  
                colButton.appendChild(buyButton);
            
                // Append the columns to the row
                row.appendChild(colDetails);
                row.appendChild(colButton);
            
                courseListElement.appendChild(row);
            });
        }
        
        populateCourseList();
    </script>
</body>
</html>
