# XPresso Games
A videogame e-commerce platform with striking neon visuals and retro-gaming aesthetics.

This project was developed during an Aulab course, in collaboration with my teammates Luigi, Matteo, and Lorenzo.  
Check out our LinkedIn profiles: [Laura](https://www.linkedin.com/in/laura-mastracci-dev/), [Luigi](https://www.linkedin.com/in/luigi-delber-v-341083286/), [Matteo](https://www.linkedin.com/in/matteo-brivio-web-developer/), [Lorenzo](https://www.linkedin.com/in/lorenzo-miglietta-developer/).

## Features
- User authentication powered by Laravel Fortify.
- Image analysis using Google API Vision (Google Vision Label Image, Google Vision Safe Search, Remove Faces and Resize Image).
- Full CRUD functionality for games from your personal dashboard.
- Apply to become a *revisor* and moderate games submitted by other users — you can even change your decisions later!
- Browse the shop using cumulative filters or search games with the full-text search bar in the navbar. You can also browse them by category using the coolest animated buttons in the homepage! 
- Add your favourite games to the wishlist and check out the most popular games in the homepage.
- Still not sure what to buy? Ask our **XP-Bot** — your AI companion for tailored game suggestions.
- Each game's detail page includes a description, user reviews, and similar game recommendations.
- Test your luck with our **coin roulette** — win discounts for your next purchase!
- Add games to your cart and proceed to checkout. Use coupons and earn coins as you go!
- After a sandboxed payment, you'll receive an email with a link to play your new game.

## How to start the project

1. Clone this repository using ```git clone``` command followed by the repository's URL.
2. Open the project navigating into the correct folder using ```cd <repository-name>``` and ```code .``` to open it using VS Code.
3. Create your .env file, using ```cp .env.example .env```.
4. Generate your key using ```php artisan key:generate```.
5. Create your MySQL database and connect it in your .env file.
6. Execute ```php artisan migrate --seed```command. This will populate your DB with premade content and users (You can login using admin@example.com and 'password', or register again with your preferred credentials).
7. Install all the necessary packages using ```npm i``` and ```composer i```.
8. Start your server using ```composer run dev```.
9. Enjoy!


NB: To enable full functionality (chatbot, mail, payments, image analysis), set up the following services:
* **OpenAI**: for XP-Bot - [get your API key](https://openai.com/api/).
* **Stripe**: for payments - [Stripe Docs](https://docs.stripe.com/api).
* **Mail**: e.g. [MailTrap](https://mailtrap.io/).
* **Google Vision**:
    - Place your credentials file as ```google-credential.json``` in the project root.
    - Set the environment variable in .env accordingly.

    ***If you don't configure Google Vision, the system will gracefully fallback using a default static image.***
