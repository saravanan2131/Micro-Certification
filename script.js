// Sample lessons
const lessons = [
    { id: 1, title: "Excel Basics", description: "Learn the essentials of Excel." },
    { id: 2, title: "JavaScript Fundamentals", description: "Understand JS core concepts." },
    { id: 3, title: "Resume Writing Tips", description: "Create a professional resume." }
];

const lessonList = document.getElementById("lessonList");
const quizContainer = document.getElementById("quizContainer");
const progressTracker = document.getElementById("progressTracker");
const certificateList = document.getElementById("certificateList");

let progress = 0;

// Display lessons
lessons.forEach(lesson => {
    const li = document.createElement("li");
    li.textContent = `${lesson.title} - ${lesson.description}`;
    li.onclick = () => loadQuiz(lesson.id);
    lessonList.appendChild(li);
});

// Load quiz for a lesson
function loadQuiz(lessonId) {
    showSection('quiz');
    quizContainer.innerHTML = `
        <p><strong>Question:</strong> What is 2 + 2?</p>
        <label><input type="radio" name="q1" value="3"> 3</label><br>
        <label><input type="radio" name="q1" value="4"> 4</label><br>
        <label><input type="radio" name="q1" value="5"> 5</label>
    `;
    document.getElementById("submitQuiz").classList.remove("hidden");
    document.getElementById("submitQuiz").onclick = () => submitQuiz(lessonId);
}

// Submit quiz
function submitQuiz(lessonId) {
    const answer = document.querySelector('input[name="q1"]:checked');
    if (answer && answer.value === "4") {
        alert("✅ Correct! Certificate awarded.");
        progress += 100 / lessons.length;
        progressTracker.textContent = `${Math.round(progress)}%`;
        const li = document.createElement("li");
        li.textContent = `Certificate for ${lessons.find(l => l.id === lessonId).title}`;
        certificateList.appendChild(li);
    } else {
        alert("❌ Incorrect. Try again!");
    }
    showSection('dashboard');
}

// Show specific section
function showSection(id) {
    document.querySelectorAll("section").forEach(sec => sec.classList.add("hidden"));
    document.getElementById(id).classList.remove("hidden");
    document.getElementById(id).classList.add("active");
}
