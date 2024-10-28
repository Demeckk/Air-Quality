let bottleCount = 0;
let bottleTypeCount = {
  botellas: 0,
};

function updateDisplay() {
  document.getElementById("bottleCount").innerText = bottleCount;
  document.getElementById("averagePerWeek").innerText = (bottleCount / 7).toFixed(2);
  document.getElementById("averagePerMonth").innerText = (bottleCount / 30).toFixed(2);
  document.getElementById("averagePerYear").innerText = (bottleCount / 365).toFixed(2);

  let bottleTypesList = document.getElementById("bottleTypes");
  bottleTypesList.innerHTML = '';
  for (let type in bottleTypeCount) {
    let li = document.createElement('li');
    li.textContent = `${type}: ${bottleTypeCount[type]}`;
    bottleTypesList.appendChild(li);
  }
  updateBottleAnimation();
}

function updateBottleAnimation() {
  const bottleFill = document.getElementById("bottle-fill");
  const fillPercentage = (bottleCount / 100) * 100; 
  bottleFill.style.height = `${Math.min(fillPercentage, 100)}%`;
}

function incrementCount() {
  bottleCount++;
  bottleTypeCount['botellas']++; // Modificar según el tipo real
  updateDisplay();
}

function decrementCount() {
  if (bottleCount > 0) {
    bottleCount--;
    bottleTypeCount['botellas']--; // Modificar según el tipo real
    updateDisplay();
  }
}

updateDisplay();
