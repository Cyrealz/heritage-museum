(function (Drupal, once) {
  Drupal.behaviors.exhibitAutocomplete = {
    attach: function (context) {
      once('exhibit-autocomplete', '.views-exposed-form input[name="title"]', context)
        .forEach(function (input) {

          const titles = [
            "Mangyan",
            "Traditional Mangyan Dress",
            "Surat Mangyan sa Kawayan",
            "Tiwa",
            "Hanunuo Mangyan Baskets",
            "Ammonites Stone",
            "Naujan Lake",
            "Brotonel Family as Pioneer in Photography in Oriental Mindoro",
            "Kayuran and Lusong Banga",
            "Tamaraw (Mindoro Dwarf Buffalo)",
            "Old Mangyan Man",
            "Raul T. Leuterio",
            "Coins",
            "Industrial Mosaic Art: Coin Portrait Series",
            "Vintage Household Items",
            "Juan L. Morente, Jr.",
            "Traditional Kitchen",
            "Agro-industrial Situation of Oriental Mindoro",
            "Bishop William Finnemann, SVD",
            "Macario G. Adriatico",
            "Traditional Dresses",
            "Traditional Living Room",
            "Juan M. Naguit Father of the Mindoro Revolution",
            "Baul and Capiz",
            "Skeletal Remains of a Female Tamaraw (Bubalus mindorensis)",
            "Ginaw Bilog"
          ];

          const wrapper = input.parentElement;
          wrapper.style.position = 'relative';

          const dropdown = document.createElement('div');
          dropdown.className = 'exhibit-search-dropdown';
          dropdown.style.display = 'none';

          wrapper.appendChild(dropdown);

          let selectedIndex = -1;

          function distance(a, b) {
            const matrix = [];

            for (let i = 0; i <= b.length; i++) {
              matrix[i] = [i];
            }

            for (let j = 0; j <= a.length; j++) {
              matrix[0][j] = j;
            }

            for (let i = 1; i <= b.length; i++) {
              for (let j = 1; j <= a.length; j++) {
                matrix[i][j] =
                  b.charAt(i - 1).toLowerCase() === a.charAt(j - 1).toLowerCase()
                    ? matrix[i - 1][j - 1]
                    : Math.min(
                        matrix[i - 1][j - 1] + 1,
                        matrix[i][j - 1] + 1,
                        matrix[i - 1][j] + 1
                      );
              }
            }

            return matrix[b.length][a.length];
          }

          function findMatches(query) {
            query = query.trim().toLowerCase();

            if (!query) {
              return [];
            }

            return titles
              .map(function (title) {
                const lower = title.toLowerCase();

                let score = 999;

                if (lower.includes(query)) {
                  score = 0;
                } else {
                  const words = lower.split(/\s+/);

                  words.forEach(function (word) {
                    score = Math.min(score, distance(query, word));
                  });

                  score = Math.min(score, distance(query, lower));
                }

                return {
                  title: title,
                  score: score
                };
              })
              .filter(function (item) {
                return item.score <= Math.max(2, Math.floor(query.length / 3));
              })
              .sort(function (a, b) {
                return a.score - b.score;
              })
              .slice(0, 6);
          }

          function showDropdown() {
            const matches = findMatches(input.value);

            dropdown.innerHTML = '';
            selectedIndex = -1;

            if (!matches.length || !input.value.trim()) {
              dropdown.style.display = 'none';
              return;
            }

            matches.forEach(function (item, index) {
              const option = document.createElement('div');

              option.className = 'exhibit-search-option';
              option.textContent = item.title;
              option.setAttribute('role', 'option');

              option.addEventListener('mousedown', function (event) {
                event.preventDefault();
              });

              option.addEventListener('click', function () {
                input.value = item.title;
                dropdown.style.display = 'none';

                const form = input.closest('form');

                if (form) {
                  form.submit();
                }
              });

              dropdown.appendChild(option);
            });

            dropdown.style.display = 'block';
          }

          input.addEventListener('input', function () {
            showDropdown();
          });

          input.addEventListener('keydown', function (event) {
            const options = dropdown.querySelectorAll('.exhibit-search-option');

            if (event.key === 'ArrowDown') {
              event.preventDefault();

              if (!options.length) {
                return;
              }

              selectedIndex = Math.min(selectedIndex + 1, options.length - 1);

              options.forEach(function (option, index) {
                option.classList.toggle('selected', index === selectedIndex);
              });
            }

            if (event.key === 'ArrowUp') {
              event.preventDefault();

              if (!options.length) {
                return;
              }

              selectedIndex = Math.max(selectedIndex - 1, 0);

              options.forEach(function (option, index) {
                option.classList.toggle('selected', index === selectedIndex);
              });
            }

            if (event.key === 'Enter' && selectedIndex >= 0 && options[selectedIndex]) {
              event.preventDefault();
              options[selectedIndex].click();
            }

            if (event.key === 'Escape') {
              dropdown.style.display = 'none';
            }
          });

          document.addEventListener('click', function (event) {
            if (!wrapper.contains(event.target)) {
              dropdown.style.display = 'none';
            }
          });
        });
    }
  };
})(Drupal, once);
