const image = document.getElementById("image");
const dName = document.getElementById("name");
const degree = document.getElementById("degree");
const speciality = document.getElementById("speciality");
const experience = document.getElementById("experience");
const availability = document.getElementById("availability");

let docData = [
  {
    name: "Dr. John Doe",
    degree: "MBBS, MD",
    speciality: "Cardiologist",
    experiece: "10 years",
    availability: "9:00 AM - 5:00 PM",
    image:
      "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png",
  },
  {
    name: "Dr. Ram",
    speciality: "Cardiologist",
    availability: "9:00 AM - 5:00 PM",
    fees: "Rs. 500",
    image:
      "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png",
  },
];

docData.forEach((item) => {
  console.log(item.name);
});

// degree.innerHTML = docData[0].degree;
// dName.innerHTML = docData[0].name;
// speciality.innerHTML = docData[0].speciality;
// experience.innerHTML = docData[0].experiece;
// availability.innerHTML = docData[0].availability;
// image.src = docData[0].image;
