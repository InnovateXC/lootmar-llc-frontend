const fs = require("fs");

const getCourses = () => {
  return JSON.parse(fs.readFileSync(`data/courses.json`, "utf-8"));
};

module.exports = { getCourses };
