const express = require("express");
const cors = require("cors"); // Import cors module
const { getCourses } = require("./lib/db.js");

const app = express();
app.use(
  cors({
    origin: "http://172.20.0.2",
  })
);

app
  .get("/health", (req, res) => {
    res.status(200).json({ status: "up" });
  })
  .get("/courses", (req, res) => {
    const courses = getCourses();

    res.status(200).json(courses);
  })
  .listen(3000, () => console.log("Server running on port 3000"));
