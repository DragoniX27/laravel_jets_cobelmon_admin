<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-100 to-white text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-white shadow p-6 sticky top-0 z-10">
      <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <h1 class="text-4xl font-extrabold text-blue-700">Santiago Giraldo Pulgarin</h1>
        <p class="text-gray-500 mt-2 md:mt-0">Desarrollador Fullstack | Laravel & Vue.js</p>
      </div>
    </header>

    <!-- Main -->
    <main class="container mx-auto px-6 py-12 space-y-14">
        <section>
            <div class="grid grid-cols-2">
                <div class="pr-9 border-r border-gray-300">
                  <h2 class="text-3xl font-semibold text-blue-600 mb-6">Sobre mí</h2>
                  <p class="text-lg leading-relaxed max-w-3xl">
                    Soy un Desarrollador Fullstack especializado en Laravel, con más de 3 años de experiencia construyendo soluciones web robustas, escalables y mantenibles. He trabajado tanto en frontend como backend, integrando APIs REST, gestionando bases de datos y desplegando en servidores Linux. Me adapto rápidamente a nuevos entornos y he liderado equipos de desarrollo en proyectos bajo metodologías ágiles como Scrum. Soy proactivo, orientado a resultados y siempre en busca de aprender nuevas tecnologías.
                  </p>
                </div>
                <!-- Contacto -->
                <div class="pl-5">
                  <h2 class="text-3xl font-semibold text-blue-600 mb-6">Contacto</h2>
                  <ul class="space-y-3">
                    <li><font-awesome-icon :icon="['far', 'envelope']" class="mr-2 text-blue-600" /> Email: <a href="mailto:santiagogil271@gmail.com" class="text-blue-600 hover:underline">santiagogil271@gmail.com</a></li>
                    <li><font-awesome-icon :icon="['fas', 'phone']" class="mr-2 text-blue-600" /> Teléfono: <a href="tel:+573023718033" class="text-blue-600 hover:underline">+57 302 371 8033</a></li>
                    <li><font-awesome-icon :icon="['fab', 'github']" class="mr-2 text-blue-600" /> GitHub: <a href="https://github.com/DragoniX27" target="_blank" class="text-blue-600 hover:underline">github.com/DragoniX27</a></li>
                    <li><font-awesome-icon :icon="['fab', 'linkedin']" class="mr-2 text-blue-600" /> LinkedIn: <a href="https://www.linkedin.com/in/santiago-giraldo-219b37191/" target="_blank" class="text-blue-600 hover:underline">linkedin.com/in/santiago-giraldo-219b37191</a></li>
                  </ul>
                </div>
            </div>
        </section>
      <!-- About Me -->

      <!-- Skills -->
      <section>
        <h2 class="text-3xl font-semibold text-blue-600 mb-6">Habilidades</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div v-for="skill in skills" :key="skill.name" class="relative group bg-white p-4 rounded-xl shadow hover:shadow-md transition">
            <div class="flex justify-between mb-2">
              <span class="font-medium text-gray-700">{{ skill.name }}</span>
              <span class="text-sm text-gray-500">{{ skill.level }}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3">
              <div
                class="bg-gradient-to-r from-blue-500 to-blue-700 h-3 rounded-full"
                :style="{ width: skill.percentage + '%' }"
              ></div>
            </div>
            <div
                class="absolute left-1/2 -translate-x-1/2 -top-8 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-20 whitespace-nowrap"
            >
                {{ skill.tooltip }}
            </div>
          </div>
        </div>
      </section>

      <!-- Experiencia -->
      <section>
        <h2 class="text-3xl font-semibold text-blue-600 mb-6">Experiencia</h2>
        <div class="space-y-8">
          <div>
                <h3 class="text-xl font-bold">
                    <a href="https://linktic.com/">LinkTic <font-awesome-icon :icon="['fas', 'up-right-from-square']" /></a>
                </h3>
                <p class="text-gray-600">03/2025 – 06/2025 | Pereira, Colombia</p>
                <p>
                    En Linktic trabajé como desarrollador en un proyecto del sector bancario, 
                    donde fui responsable de crear múltiples módulos clave para la aplicación. 
                    Durante este tiempo, fortalecí mis conocimientos en herramientas modernas de desarrollo y despliegue, 
                    destacando el uso de tecnologías como:
                    <ul class="list-disc list-inside mt-2">
                        <li>
                            Docker: configuración de contenedores, despliegue en entornos locales e 
                            integración con WSL para optimizar el entorno de desarrollo.
                        </li>
                        <li>
                            Azure DevOps: gestión de tareas bajo la metodología Scrum, trabajo con múltiples 
                            repositorios y aplicación de buenas prácticas en la nomenclatura y estandarización de Pull Requests.
                        </li>
                    </ul>
                </p>
          </div>
            <div>
                <h3 class="text-xl font-bold">
                    <a href="https://solvoglobal.com/">Solvo Global <font-awesome-icon :icon="['fas', 'up-right-from-square']" /></a>
                </h3>
                <p class="text-gray-600">2024 – 02/2025 | Manizales, Colombia</p>
                <p>
                    En Solvo Global fui responsable de desarrollar flujos de trabajo e integraciones con la plataforma Bitrix24,
                    contribuyendo a la automatización de procesos internos. Aunque fue una experiencia breve, me permitió fortalecer mis habilidades
                    en la integración de herramientas externas y en la adaptación a entornos de trabajo dinámicos.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-bold">
                    <a href="https://servimercadeo.com/">Servimercadeo <font-awesome-icon :icon="['fas', 'up-right-from-square']" /></a>
                </h3>
                <p class="text-gray-600">2022 – 2024 | Manizales, Colombia</p>
                <p>
                    En mi rol en Servimercadeo, fui responsable del
                    soporte, mantenimiento y mejora de
                    funcionalidades del sistema en línea disponible en
                    https://crm.servimercadeo.com/ . Este
                    aplicativo interno de la compañía está diseñado
                    para la entrada parametrizada de ventas de los
                    clientes de la empresa, como Tigo y Directv, así
                    como para la gestión de requisiciones y ausencias
                    del personal el cual esta conectado con la app
                    Bitrix24 donde se realiza la gestión de ventas a
                    las cuales realice automatizaciones eh
                    integraciones; Durante mi tiempo en esta
                    posición, utilicé las siguientes tecnologías:
                    <ul class="list-disc list-inside mt-2">
                        <li>
                            Laravel: Gestión del backend y manejo de
                            sesiones.
                        </li>
                        <li>
                            Vue.js: Desarrollo del frontend para mejorar la
                            experiencia del usuario y optimizar el consumo
                            de datos.
                        </li>
                        <li>
                            Consumo de RESTAPI de Bitrix24: Integración
                            para la entrada de ventas, dado que la empresa
                            utiliza esta herramienta para la gestión de
                            ventas.
                        </li>
                        <li>
                            Bitrix24: Realizando automatizaciones y
                            integraciones con el CRM de la empresa.
                        </li>
                        <li>
                            AWS: Manejo de servidores y despliegue de
                            aplicaciones.
                        </li>
                    </ul>
                </p>
          </div>
          <div>
            <h3 class="text-xl font-bold">
                <a href="https://licitaciones.info/">Licitaciones.info <font-awesome-icon :icon="['fas', 'up-right-from-square']" /></a>
            </h3>
            <p class="text-gray-600">2021 – 2022 | Manizales, Colombia</p>
            <p>
                En Licitaciones.info , contribuí al desarrollo del
                aplicativo web de la compañía, disponible en
                https://www.licitaciones.info/ , Durante mi
                tiempo en este rol, adquirí y apliqué
                conocimientos en las siguientes tecnologías:
                
                <ul class="list-disc list-inside mt-2">
                    <li>
                        Laravel: Gestión de consultas y lógica del
                        servidor.
                    </li>
                    <li>
                        Redis: Manejo de eventos y envío de correos.
                    </li>
                    <li>
                        Vue.js: Desarrollo de la interfaz de usuario.
                    </li>
                    <li>
                        GitHub: Desarrollo colaborativo y control de
                        cambios del código en un equipo de trabajo.
                    </li>
                    <li>
                        Postman: Uso y prueba de API REST de
                        diversos servicios,
                    </li>
                </ul>
            </p>
          </div>
        </div>
      </section>

      <section>
        <h2 class="text-3xl font-semibold text-blue-600 mb-10 text-center">Proyectos</h2>
        <p class="text-lg leading-relaxed my-4">
            Aqui veran algunos de mis poryectos personales donde he aplicado mis conocimientos, la mayoría de estos fueron creados con el objetivo de aprender y mejorar mis habilidades en desarrollo.
        </p>
        <div class="container mx-auto px-4 w-full">

            <Carousel :items-to-show="1" :wrap-around="true" class="mx-auto w-full">
                <template #slides>
                    <Slide v-for="project in projects" :key="project.id">
                        <div class="bg-white rounded-2xl shadow p-6 mx-4 w-full h-full">
                            <h3 class="text-2xl font-bold mb-2 text-gray-800">{{ project.title }}</h3>
                            <img :src="project.image" :alt="project.title" class="rounded-xl mb-4 w-full h-60 object-cover" />
                            <p class="text-gray-600 mb-4">{{ project.description }}</p>
                            <div class="flex justify-between items-center text-sm">
                            <a :href="project.repo" target="_blank" class="text-gray-600 hover:text-black">
                                <font-awesome-icon :icon="['fab', 'github']" class="mr-1" /> Código
                            </a>
                            </div>
                        </div>
                    </Slide>
                </template>
                <template #addons>
                    <Navigation />
                </template>
            </Carousel>
        </div>
    </section>

      <!-- Educación -->
      <section>
        <h2 class="text-3xl font-semibold text-blue-600 mb-6">Educación</h2>
        <div>
          <h3 class="text-xl font-bold">Tecnólogo en Análisis y Desarrollo de Sistemas de Información</h3>
          <p class="text-gray-600">SENA Regional Caldas · 2017 – 2021</p>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white p-4 text-center text-sm text-gray-500">
      &copy; {{ new Date().getFullYear() }} Santiago Giraldo. Todos los derechos reservados.
    </footer>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Carousel, Slide, Navigation } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'

export default defineComponent({
  name: 'Portfolio',
    components: {
        Carousel,
        Slide,
        Navigation
    },
  data() {
    return {
      skills: [
        { name: 'Laravel', level: 'Experto', percentage: 100, tooltip: 'Este es el framework que mas manejo pues lo he utilizado desde que empece en el mundo del desarrollo (3 años)'  },
        { name: 'Vue.js', level: 'Experto', percentage: 100, tooltip: 'Cuento con 3 años de experiencia usando este framework para generar vistas intuitibas para los usuarios'  },
        { name: 'PHP', level: 'Avanzado', percentage: 90, tooltip: 'Al usar tnato laravel eh aprendido mucho sobre el manejo de PHP al ser este su lenguaje nativo'  },
        { name: 'JavaScript', level: 'Avanzado', percentage: 90, tooltip: 'Eh usado javescript para el manejo de multiples cosas ah nivel de front'  },
        { name: 'HTML/CSS', level: 'Experto', percentage: 100, tooltip: 'Eh realizado diferentes vistas para usuarios buscando tener el mejor enmaquetado en cada una de ellas'  },
        { name: 'SQL', level: 'Avanzado', percentage: 90, tooltip: 'Eh manejado multiples tipo de bases de datos, realizando consulta, normalizaciones, importes, exportes y reportes de las mismas segun se me pida'  },
        { name: 'Git', level: 'Avanzado', percentage: 90, tooltip: 'Utilizo Git como la herramienta principal para la gestion de mis proyectos, eh manejado sistemas de versionamiento y estructuras de documentacion como Gitflow'  },
        { name: 'Docker', level: 'Intermedio', percentage: 60, tooltip: 'Utilizo docker para levantar mis proyectos de manera sencilla, ademas de integrase perfectamente con WSL para dar un entorno de desarrollo lo mas parecido a produccion posible'  },
        { name: 'C#', level: 'Intermedio', percentage: 60, tooltip: 'Actualmente me encuentro aprendiendo este lenguaje para la creacion de proyectos en unity con conocidos'  },
        { name: 'AzureDevOps', level: 'Intermedio', percentage: 50, tooltip: 'Eh tenido la oportunidad de poder usar las herramientas de Azure mas de una vez, indagando sobretodo de las de desarrollo'  },
        { name: 'Java', level: 'Intermedio', percentage: 50, tooltip: 'Actualmente me encuentro aprendiendo este lenguaje pues eh estado montando proyectos en Minecraft donde eh tenido que crear codigo propio para el manejo de entidades'  },
        { name: 'Kotlin', level: 'Intermedio', percentage: 50, tooltip: 'Actualmente me encuentro aprendiendo este lenguaje pues eh estado montando proyectos en Minecraft donde eh tenido que crear codigo propio para el manejo de entidades'  },
      ],
      projects: [
        {
            id: 1,
            title: "Room 911",
            description: "Proyecto de gestion echo en laravel Jestream donde el cual se creo para terminar a mi manera el taller de Room 911. Este proyecto incluye funcionalidades como la gestion de usuarios, roles, permisos, y seguimiento de autenticacion.",
            image: "https://picperf.io/https://laravelnews.s3.amazonaws.com/images/jetstream.png",
            repo: "https://github.com/DragoniX27/room_911"
        },
        {
            id: 2,
            title: "Proyecto Prueba laravel 12",
            description: "Este proyecto es para generar una API REST con laravel 12, el se creo usando Docker, Laravel sanctum y Laravel Spatie, cuenta con distintos endpoints par la gestion de usuarios, palnes y empresas, una arquitectura por capas y sistemas de validacion de datos.",
            image: "https://miro.medium.com/v2/resize:fit:1200/1*-bTllKQ3i5nKXDR7nn21fA.jpeg",
            repo: "https://github.com/DragoniX27/prueba_laravel_12"
        },
        {
            id: 3,
            title: "Proyecto Minecraft Cobbelmon",
            description: "En este proyecto cree un servidor de Minecraft con un mod creado por mi con el cual el servidor de minecraft se conecta por medio de eventos de redis a una app Laravel, todo basado usando el conocido mod de cobblemon; el sistema permite hacer segimiento a los pokemons capturados y gestion de jugadores desde la app Laravel.",
            image: "https://www.minecraft-hosting.pro/files/packs/modified-cobblemon-plus_1.webp",
            repo: "https://github.com/DragoniX27/prueba_laravel_12"
        },
      ]
    }
  }
})
</script>

<style scoped>
body {
  font-family: 'Lato', 'Open Sans', sans-serif;
    section {
        border-bottom: 1px solid #e5e7eb;
        padding-bottom: 2rem;
        margin-bottom: 2rem;
    }
}
</style>