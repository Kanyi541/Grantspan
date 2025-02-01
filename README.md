Grant Span Website



Welcome to the Grant Span website repository! Grant Span is a platform dedicated to providing streamlined solutions for grant management, making it easier for organizations and individuals to apply for, track, and manage grants.



Table of Contents



Features



Technologies



Installation



Usage



Contributing



License



Features



Grant Applications: Submit and manage grant applications with ease.



User Dashboard: Personalized dashboards to monitor the status of applications.



Search and Filter: Quickly find grants that fit specific criteria.



Secure Payment Integration: Make necessary payments with ease using Paystack.



Database Management: All data is securely stored and managed using PlanetScale.



Technologies



The Grant Span website is built with the following technologies:



Frontend: React, TailwindCSS for styling



Backend: Node.js, Express.js



Database: MySQL via PlanetScale



Payment Gateway: Paystack



Hosting: Vercel



Installation



Follow these steps to set up the project locally:



Clone the repository:



git clone https://github.com/yourusername/grantspan.git

cd grantspan



Install dependencies:



npm install



Set up environment variables:

Create a .env file in the root of your project and add the following:



DATABASE_URL=<your_planetscale_database_url>

PAYSTACK_SECRET_KEY=<your_paystack_secret_key>



Run the development server:



npm run dev



Your website will be available at http://localhost:3000.



Usage



Grant Seekers: Register, browse available grants, and submit applications.



Administrators: Log in to manage grants and track user activity.



Payments: Use the Paystack integration for secure payments related to grant applications.



Contributing



We welcome contributions! If you'd like to improve the Grant Span website, please:



Fork the repository.



Create a new branch for your feature or bug fix:



git checkout -b feature-name



Make your changes and commit them:



git commit -m "Add your message here"



Push to your fork:



git push origin feature-name



Open a pull request.



License



This project is licensed under the MIT License.



Thank you for using Grant Span! If you have any questions or feedback, feel free to reach out.

