    
   <div id="video-container"></div>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    window.onload = async function() {
      const apiUrl = "https://your-shoti-api.vercel.app/api/v1/get";
      const apiKey = "$shoti-1hk46gf5vb1o5qbkgh";

      try {
        const { data } = await axios.post(apiUrl, { apikey: apiKey });

        if (data.code === 200) {
          const videoContainer = document.getElementById("video-container");
          videoContainer.style.display = "block";
          videoContainer.innerHTML = `
          
            <video style="width:100%;height: 100%;" controls autoplay>
              <source src="${data.data.url}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          `;
          document.body.style.overflow = "hidden";
        } else {
          alert(`Error: ${data.message}`);
        }
      } catch (error) {
        console.error("Error fetching data:", error);
        alert("Error fetching data. Please try again later.");
      }
    }
  </script>