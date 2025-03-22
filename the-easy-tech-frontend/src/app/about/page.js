import React from 'react'

import NavBottom from '@/components/Header/NavBottom/NavBottom'
import NavTop from '@/components/Header/NavTop/NavTop'
import Partner from '@/components/Partner/Partner'
import Footer from '@/components/Footer/Footer';
import BreadCrumb from '@/components/BreadCrumb/BreadCrumb'
import SectionAbout from './SectionAbout/SectionAbout'
import Counter from '@/components/Counter/Counter'
import Service from '@/components/Service/Service'

import services from "@/data/service.json"

const page = () => {
    return <div className="overflow-x-hidden">
        <header id="header">
            <NavTop />
            <NavBottom />
        </header>

        <main className="content">
           <BreadCrumb {...{
                img:"/header.webp",
                title: "Lorem ipsum dolor sit amet.",
                link: "About Us",
                desc: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. In repudiandae asperiores iure animi. Tenetur numquam sit facere consequuntur officia dolore commodi quod maiores sapiente voluptatum explicabo amet, est earum eveniet.",
            }} />
            <SectionAbout />
            <Counter />
            <Service services={services} />
        </main>

        <Partner className='lg:mt-[100px] sm:mt-16 mt-10' /> 

        <footer id="footer">
            <Footer />
        </footer>
    </div>
};

export default page;