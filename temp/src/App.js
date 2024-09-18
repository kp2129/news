import './App.css';
import images from './Images';
import { IconMail } from '@tabler/icons-react';
import { IconBrandLinkedin } from '@tabler/icons-react';
import { IconBrandGithub } from '@tabler/icons-react';
import { IconFile } from '@tabler/icons-react';

function App() {
  return (
    <div className="App">

      <header className="App-header">
        <h1>I'm Kristaps Polis.</h1>
        <div className='social-container'>
          <a href="https://github.com/kp2129" target="_blank" rel="noopener noreferrer">
            <IconBrandGithub />
          </a>
          <a href="https://www.linkedin.com/in/kristaps-polis-10064a299/" target="_blank" rel="noopener noreferrer">
            <IconBrandLinkedin />
          </a>
          <a href={require('./files/KristapsPolis_CV.pdf')} download="Kristaps_Polis_CV.pdf">
            <IconFile />
          </a>
        </div>

      </header>

      <main className="App-main">
        <section className="About-section">
          <div className='about-container'>
            <img src={images.me} alt='photo of me' />
            <div className='about-me'>
              <h2>About me</h2>
              <p>I am a web developer with a solid foundation in both front-end and back-end technologies. I have been programming for 4 years and have expertise in Laravel and React, allowing me to create functional solutions on both the server and client sides. I began my programming journey with PHP, HTML, JavaScript, MySQL, and CSS. I also use Tailwind CSS and Bootstrap to design modern and aesthetically pleasing websites.</p>

            </div>
          </div>
        </section>

        <section className="Skills-section">
          <div>
            <h2>Skills</h2>
          </div>
          <div className='skills-container'>
            <img src={images.reactLogo} alt="React logo" />
            <img src={images.laravelLogo} alt="Laravel logo" />
            <img src={images.viteLogo} alt="Vite logo" />
            <img src={images.tailwindLogo} alt="Tailwind logo" />
            <img src={images.phpLogo} alt="PHP logo" />
            <img src={images.mysqlLogo} alt="MYSQL logo" />
            <img src={images.jsLogo} alt="JS logo" />
            <img src={images.jqueryLogo} alt="JQuery logo" />
            <img src={images.inertiaLogo} alt="Inertia logo" />
            <img src={images.htmlLogo} alt="HTML logo" />
            <img src={images.firebaseLogo} alt="Firebase logo" />
            <img src={images.filamentLogo} alt="Filamnet logo" />
            <img src={images.cssLogo} alt="Css logo" />


          </div>
        </section>

        <section className="Education-section">
          <div>
            <h2>Education</h2>
          </div>
          <div className='educations'>
            <div>
              <h3>Vidzeme Technology and Design Vocational School</h3>
              <p>Programming technician 01/09/2021-On going</p>
            </div>
            <div>
              <h3>Vecpiebalga secondary school</h3>
              <p>01/09/2018 – 12/06/2021</p>
            </div>
            <div>
              <h3>Inešu primary school</h3>
              <p>01/09/2009 – 31/05/2018</p>
            </div>
          </div>
        </section>

        <section className="projects-section">
          <div>
            <h2>Projects</h2>
          </div>
          <div className="projects-grid">
            {/* <div className="project-card">
              <div className='project-img'>
                <img src={images.eduscan} alt="EduSan Screenshot" loading="lazy" />
              </div>
              <div className='project-about'>
                <h3>EduScan</h3>
                <p>Mobile app created for sshool to allow student check in scholl</p>
              </div>
            </div> */}

            <div className="project-card">
              <div className='project-img'>
                <img src={images.knights} alt="(K)Night Runner Game Screenshot" loading="lazy" />
              </div>
              <div className='project-about'>
                <h3>(K)Night Runner</h3>
                <p>"(K)night Runner" is a 2D platformer game built using the Godot engine, where players control a brave knight on a thrilling adventure. The knight constantly runs forward, and players must guide him by timing jumps to avoid various obstacles, such as pits, spikes, and enemy creatures.
                  The game's focus is on precision and reflexes, challenging players to navigate increasingly difficult terrain while collecting power-ups and coins along the way.
                  The simple yet engaging mechanics, coupled with a medieval setting, make "(K)night Runner" an exciting, fast-paced challenge.</p>
              </div>
            </div>

            <div className="project-card">
              <div className='project-img'>
                <img src={images.rucka} alt="Rucka Manor Website Screenshot" loading="lazy" />
              </div>
              <div className='project-about'>
                <h3>Rucka Manor Website</h3>
                <p>Myself and five other contributors have created a website for Rucka Manor Park, the geographical heart of Cesis. It is safe to say that since 1577, the most beautiful monument of our antiquity has been proudly located at the very center of Cesis.</p>
                <div>
                  <a href='https://ruckasmuiza.lv'>Visit the site!</a>
                </div>
              </div>

            </div>

            <div className="project-card">
              <div className='project-img'>
                <img src={images.news} alt="News Website Screenshot" loading="lazy" />
              </div>
              <div className='project-about'>
                <h3>News Website</h3>
                <p>The News website project was a team experience where we worked together to create our vision of how a modern news platform should look. We aimed for a clean, user-friendly design that puts content at the forefront while ensuring easy navigation. It was a collaborative effort where we combined creativity with practicality to shape what we believe a news website should be</p>
              </div>
            </div>

            <div className="project-card">
              <div className='project-img'>
                <img src={images.todomist} alt="Jira Replacement Screenshot" loading="lazy" />
              </div>
              <div className='project-about'>
                <h3>Jira Replacement</h3>
                <p>Todomist was an ambitious project where, as a team, we set out to create a Jira alternative for task and issue tracking within a short time frame. Our goal was to build a simple yet effective tool that streamlines project management and helps teams stay organized.</p>
              </div>
            </div>

            <div className="project-card">
              <div className='project-img'>
                <img src={images.autoscam} alt="Online Car Shop Screenshot" loading="lazy" />
              </div>
              <div className='project-about'>
                <h3>Online Car Shop</h3>
                <p>Autoscam was my first team project, and it was an eye-opening experience. It showed me just how efficient work can be when you're part of a great team. The collaboration, communication, and shared vision we had made the project flow smoothly and helped us overcome challenges quickly. It was an excellent example of how a team with the right skills and mindset can achieve much more together than as individuals</p>
              </div>
            </div>
          </div>
        </section>


        <section className="App-section feedback-section">
          <div className='feedback-title'>
            <h2>Feedback</h2>
          </div>
          <div className='feedback'>
            <div className='feedback-box'>
              <div className='feedback-name'><p>Jēkabs Krīgerts</p></div>
              <div className='feedback-text'><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam metus risus, sodales vel consequat non, gravida id sapien. Quisque blandit, libero eget tincidunt sollicitudin, nibh sapien volutpat leo, eget tempor metus nunc et purus. Morbi sapien lacus, vehicula ut dui quis, malesuada suscipit est. Praesent fringilla
                aliquam ullamcorper.  Quisque non ipsum non tellus malesuada sodales. Aliquam faucibus, arcu ut </p></div>
            </div>
            <div className='feedback-box'>
              <div className='feedback-name'><p>Jēkabs Krīgerts</p></div>
              <div className='feedback-text'><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam metus risus, sodales vel consequat non, gravida id sapien. Quisque blandit, libero eget tincidunt sollicitudin, nibh sapien volutpat leo, eget tempor metus nunc et purus. Morbi sapien lacus, vehicula ut dui quis, malesuada suscipit est. Praesent fringilla
                aliquam ullamcorper. Quisque non ipsum non tellus malesuada sodales. Aliquam faucibus, arcu ut </p></div>
            </div><div className='feedback-box'>
              <div className='feedback-name'><p>Jēkabs Krīgerts</p></div>
              <div className='feedback-text'><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam metus risus, sodales vel consequat non, gravida id sapien. Quisque blandit, libero eget tincidunt sollicitudin, nibh sapien volutpat leo, eget tempor metus nunc et purus. Morbi sapien lacus, vehicula ut dui quis, malesuada suscipit est. Praesent fringilla
                aliquam ullamcorper. Quisque non ipsum non tellus malesuada sodales. Aliquam faucibus, arcu ut </p></div>
            </div>
          </div>
        </section>

        <section className="Contacts-section">
          <h2>Contacts</h2>

          <div className='my-info'>
            <IconMail />
            <p><a href="mailto:kristapspolis0@gmail.com">kristapspolis0@gmail.com</a></p>
          </div>
          <div className='my-info'>
            <IconBrandLinkedin />
            <p> <a href="https://www.linkedin.com/in/kristaps-polis-10064a299/"> Kristaps Polis</a></p>
          </div>
          <div className='my-info'>
            <IconFile />
            <p> <a href={require('./files/KristapsPolis_CV.pdf')} download="Kristaps_Polis_CV.pdf">
            Download CV
            </a></p>
          </div>
          
        </section>
      </main>

      <footer className="App-footer">
        <p>KP2129</p>
      </footer>
    </div>
  );
}

export default App;
