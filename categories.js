<script>
    document.addEventListener('DOMContentLoaded', function() {
            // Sample categories data
            const categories = [
    {
        id: 1,
    title: "Pizza",
    image: "https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
    description: "Delicious cheesy pizzas with various toppings"
                },
    {
        id: 2,
    title: "Burgers",
    image: "https://images.unsplash.com/photo-1553979459-d2229ba7433b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
    description: "Juicy burgers with fresh ingredients"
                },
    {
        id: 3,
    title: "Sushi",
    image: "https://images.unsplash.com/photo-1579584425555-c3ce17fd4351?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
    description: "Fresh and authentic Japanese sushi"
                },
    {
        id: 4,
    title: "Salads",
    image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
    description: "Healthy and fresh salad options"
                },
    {
        id: 5,
    title: "Desserts",
    image: "https://images.unsplash.com/photo-1551024506-0bccd828d307?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
    description: "Sweet treats to satisfy your cravings"
                },
    {
        id: 6,
    title: "Beverages",
    image: "https://images.unsplash.com/photo-1544148103-0773bf10d330?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
    description: "Refreshing drinks and beverages"
                }
    ];

    const categoriesGrid = document.getElementById('categoriesGrid');
    const searchInput = document.getElementById('searchInput');

    // Render categories
    function renderCategories(categoriesArray) {
        categoriesGrid.innerHTML = '';

    if (categoriesArray.length === 0) {
        categoriesGrid.innerHTML = `
                        <div class="no-categories">
                            <i class="fas fa-search"></i>
                            <h3>No categories found</h3>
                            <p>Try adjusting your search terms or browse all categories</p>
                        </div>
                    `;
    return;
                }
                
                categoriesArray.forEach(category => {
                    const categoryCard = document.createElement('div');
    categoryCard.className = 'category-card';

    categoryCard.innerHTML = `
    <div class="category-img">
        <img src="${category.image}" alt="${category.title}">
    </div>
    <div class="category-content">
        <h3>${category.title}</h3>
        <p>${category.description}</p>
        <a href="#" class="category-link">Explore</a>
    </div>
    `;

    categoriesGrid.appendChild(categoryCard);
                });
            }

    // Filter categories based on search input
    function filterCategories() {
                const searchText = searchInput.value.toLowerCase();
                const filteredCategories = categories.filter(category =>
    category.title.toLowerCase().includes(searchText) ||
    category.description.toLowerCase().includes(searchText)
    );

    renderCategories(filteredCategories);
            }

    // Event listener for search input
    searchInput.addEventListener('input', filterCategories);

    // Initial render
    renderCategories(categories);

    // Add animation to category cards when they come into view
    const observerOptions = {
        root: null,
    rootMargin: '0px',
    threshold: 0.1
            };
            
            const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
            }, observerOptions);

            // Observe category cards after they are rendered
            setTimeout(() => {
        document.querySelectorAll('.category-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });
            }, 100);
        });
</script>