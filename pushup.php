<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="motion.css">
	<title>Push Up</title>
</head>
<body>
    <div class = "page">
    <nav class="navbar">
            <div class="left">
                <h1>Motion Detection</h1>
            </div>
            <div class="right">
                <input type="checkbox" id="check">
                <label for="check" class="checkBtn">
                    <i class="fa fa-bars"></i>
                </label>
                <ul class="list">
                    <li><a href="main.php">Home</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>      
        </nav>  
        <h1>Push UP</h1>
 
    <div class="center">
        <div><canvas id="canvas"></canvas></div>
        <button type="button" onclick="init()">Start</button>
        <div id="label-container"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/pose@0.8/dist/teachablemachine-pose.min.js"></script>
    <script type="text/javascript">
        // More API functions here:
        // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/pose

        // the link to your model provided by Teachable Machine export panel
        const URL = "https://teachablemachine.withgoogle.com/models/Z4555iYvB/";
        let model, webcam, ctx, labelContainer, maxPredictions;

        async function init() {
            const modelURL = URL + "model.json";
            const metadataURL = URL + "metadata.json";

            // load the model and metadata
            // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
            // Note: the pose library adds a tmPose object to your window (window.tmPose)
            model = await tmPose.load(modelURL, metadataURL);
            maxPredictions = model.getTotalClasses();

            // Convenience function to setup a webcam
            const size = 500;
            const flip = true; // whether to flip the webcam
            webcam = new tmPose.Webcam(size, size, flip); // width, height, flip
            await webcam.setup(); // request access to the webcam
            await webcam.play();
            window.requestAnimationFrame(loop);

            // append/get elements to the DOM
            const canvas = document.getElementById("canvas");
            canvas.width = size; canvas.height = size;
            ctx = canvas.getContext("2d");
            labelContainer = document.getElementById("label-container");
            for (let i = 0; i < maxPredictions+1; i++) { // and class labels
                labelContainer.appendChild(document.createElement("div"));
            }
        }

        async function loop(timestamp) {
            webcam.update(); // update the webcam frame
            await predict();
            window.requestAnimationFrame(loop);
        }
        let count = 0, position = "up";

        async function predict() {
            // Prediction #1: run input through posenet
            // estimatePose can take in an image, video or canvas html element
            const { pose, posenetOutput } = await model.estimatePose(webcam.canvas);
            // Prediction 2: run input through teachable machine classification model
            const prediction = await model.predict(posenetOutput);

            labelContainer.childNodes[2].innerHTML= "Count:" + count;//顯示計數
            console.log(count)

            

            for (let i = 0; i < maxPredictions; i++) {
                const classPrediction =
                    prediction[i].className + ": " + prediction[i].probability.toFixed(2);
                //labelContainer.childNodes[i].innerHTML = classPrediction;//顯示分段動作
                
                if (prediction[1].probability.toFixed(2) == 1.00)
                {
                    position = "down";
                }
                 if (prediction[0].probability.toFixed(2) == 1.00 && position =="down")
                {
                    position = "up";
                    count +=1;
                }
                
                
            }
            

            // finally draw the poses
            drawPose(pose);
        }

        function drawPose(pose) {
            if (webcam.canvas) {
                ctx.drawImage(webcam.canvas, 0, 0);
                // draw the keypoints and skeleton
                if (pose) {
                    const minPartConfidence = 0.5;
                    tmPose.drawKeypoints(pose.keypoints, minPartConfidence, ctx);
                    tmPose.drawSkeleton(pose.keypoints, minPartConfidence, ctx);
                }
            }
        }
    </script>
    </div>    
</body>
    
</html>