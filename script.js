let progress = 0;
let certificates = [];
let streakCount = 0;
let lastLogin = localStorage.getItem("lastLogin");

function startLearning() {
    updateStreak();
    alert("Choose a lesson and start your learning journey!");
}

function startQuiz(lessonName) {
    updateStreak();
    let score = prompt(`You are taking the quiz for ${lessonName}. Enter your score (0-100):`);
    score = parseInt(score);

    if (score >= 70) {
        alert(`🎉 Congratulations! You passed ${lessonName}.`);
        certificates.push(`${lessonName} Certificate`);
        updateCertificates();
        updateProgress();
        showPopup(`${lessonName} Certificate`);
    } else {
        alert(`❌ You need at least 70% to pass ${lessonName}. Try again!`);
    }
}

function updateProgress() {
    progress = (certificates.length / 3) * 100;
    document.getElementById("progress-fill").style.width = `${progress}%`;
    document.getElementById("progress-fill").innerText = `${Math.floor(progress)}%`;
}

function updateCertificates() {
    let list = document.getElementById("certificate-list");
    list.innerHTML = "";
    certificates.forEach(cert => {
        let div = document.createElement("div");
        div.classList.add("certificate");
        div.innerHTML = `🏆 ${cert}`;
        list.appendChild(div);
    });
    updateLeaderboard();
}

function updateLeaderboard() {
    let lb = document.getElementById("leaderboard-list");
    lb.innerHTML = `
        <li><strong>John Doe</strong> - 3 Certificates</li>
        <li><strong>Jane Smith</strong> - 2 Certificates</li>
        <li><strong>You</strong> - ${certificates.length} Certificates</li>
    `;
}

function updateStreak() {
    let today = new Date().toDateString();
    if (lastLogin !== today) {
        streakCount++;
        localStorage.setItem("lastLogin", today);
        localStorage.setItem("streakCount", streakCount);
    }
    streakCount = parseInt(localStorage.getItem("streakCount")) || 0;
    document.getElementById("streak-count").innerText = streakCount;
}

function showPopup(certificateName) {
    document.getElementById("popup-text").innerText = `You earned the ${certificateName}!`;
    document.getElementById("certificate-popup").classList.remove("hidden");
}

function closePopup() {
    document.getElementById("certificate-popup").classList.add("hidden");
}

window.onload = () => {
    streakCount = parseInt(localStorage.getItem("streakCount")) || 0;
    document.getElementById("streak-count").innerText = streakCount;
};
