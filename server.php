<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Search</title>
    <style>
        /* Add CSS styles for better presentation */
        .anime-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
        }
        .anime-img {
            max-width: 100px;
            max-height: 150px;
        }
    </style>
</head>
<body>
    <h1>Anime Search</h1>
    <div class="heading">
        <input type="search" id="srch" placeholder="Search Anime Title">
        <button type="button" id="searchBtn">Search</button>
    </div>
    <div id="searchResults"></div>

    <script>
        // Function to search for anime titles using an API
        async function searchAnimeByTitle(title) {
            try {
                const response = await fetch(`https://webdis-yfx7.onrender.com/search?keyw=${title}`);
                const data = await response.json();

                return data; // Return the response data
            } catch (error) {
                console.error('Error fetching data:', error);
                return []; // Return an empty array in case of an error
            }
        }

        // Function to display anime data based on search
        function displaySearchResults(searchQuery) {
            const searchResultsContainer = document.getElementById('searchResults');
            searchResultsContainer.innerHTML = '';

            // Search for anime titles using the API
            searchAnimeByTitle(searchQuery)
                .then(data => {
                    if (data.length === 0) {
                        const noResultsMessage = document.createElement('p');
                        noResultsMessage.textContent = 'No results found.';
                        searchResultsContainer.appendChild(noResultsMessage);
                    } else {
                        data.forEach(anime => {
                            const animeElement = document.createElement('div');
                            animeElement.classList.add('anime-item');
                            animeElement.innerHTML = `
                                <h2>${anime.animeTitle}</h2>
                                <img src="${anime.animeImg}" alt="${anime.animeTitle}" class="anime-img">
                                <p>Status: ${anime.status}</p>
                                <a href="${anime.animeUrl}" target="_blank">Watch Anime</a>
                            `;
                            searchResultsContainer.appendChild(animeElement);
                        });
                    }
                });
        }

        // Search button click event
        const searchButton = document.getElementById('searchBtn');
        searchButton.addEventListener('click', () => {
            const searchInput = document.getElementById('srch');
            const searchQuery = searchInput.value.trim();
            displaySearchResults(searchQuery);
        });
    </script>
</body>
</html>
