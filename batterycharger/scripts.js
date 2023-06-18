const energy = document.querySelector(".energy");
//const cracks = document.querySelector(".cracks");
const battery = document.querySelector(".battery");
const percentage = document.querySelector(".percentage");
const resetBtn = document.getElementById("resetBtn");
const rechargeBtn = document.getElementById("rechargeBtn");

function chargeBattery() {
    let charge = 0;

    const interval = setInterval(() => {
        if (charge < 100) {
            charge++;
            energy.style.height = `${charge * 4}px`; // Multiply by 4 since battery height is 400px
            percentage.textContent = `${charge}%`;
        } else {
            clearInterval(interval);
            overchargeBattery(charge); // Start overcharging the battery
        }
    }, 100 - charge / 10);
}

function overchargeBattery(charge) {
    //cracks.classList.add("visible"); // Add the "visible" class to show crack animation

    const interval = setInterval(() => {
        if (charge < 1000000000000) {
            charge = charge + Math.round(1 + 1 * charge / 500);
            if (charge % 40 == 0) {
                //beep();
            }
            const he = 400 + charge / 500;
			if (he>800)
			{
			energy.style.height = '800px';
            battery.style.height ='800px';	
			}
			else
			{
            energy.style.height = `${he}px`;
            battery.style.height = `${he}px`;
			}
            //percentage.textContent = `${charge.toLocaleString("en-US")}%`;
			percentage.textContent = `${charge.toLocaleString("en-US")}000000000000000000000000000000000%`;
            const redValue = Math.min(255, (charge - 100) * 0.255); // Calculate the red value (0-255)
            energy.style.backgroundColor = `rgb(${redValue}, ${255 - redValue}, 0)`; // Gradually change color from green to red
            battery.style.width = `${(charge - 100) / 2 + 200}px`;
            battery.style.borderRadius = `${(charge - 100) / 2 + 15}px`;
            //battery.style.top = `${Math.round(Math.random()*5)}px`;
        } else {
            clearInterval(interval);
            //superchargeBattery(charge);
        }
    }, 50 - charge / 40);
}

function resetBattery() {
    energy.style.height = "0px";
    percentage.textContent = "0%";
    energy.style.backgroundColor = "green"; // Reset the color to green
    battery.style.width = "200px";
    battery.style.height = "400px";
    battery.style.borderRadius = "15px";
    //cracks.classList.remove("visible"); // Remove the "visible" class to hide crack animation
}

function beep() {
    var snd = new Audio("siren.m4a");
    snd.play();
}


function explosion() {
    var snd = new Audio("explosion.mp3");
    snd.play();
}
chargeBattery();

resetBtn.addEventListener("click", resetBattery);
rechargeBtn.addEventListener("click", chargeBattery);