"use client"
import React, { useEffect, useState } from 'react'

import NavBottom from '@/components/Header/NavBottom/NavBottom'
import NavTop from '@/components/Header/NavTop/NavTop'
import Partner from '@/components/Partner/Partner'
import Footer from '@/components/Footer/Footer';
import BreadCrumb from '@/components/BreadCrumb/BreadCrumb'
import Counter from '@/components/Counter/Counter'
import Service from '@/components/Service/Service'
import ImageTextBox from '@/components/ImageTextBox/ImageTextBox'
import TextSection from '@/components/Sections/about/TextSection'
import Loader from '@/components/Loader/Loader';

import { URL_API } from '@/config/config'
import useFetch from "@/hooks/useFetch"

const page = () => {
    const [ dataAbout, loadingAbout ] = useFetch(`${URL_API}/about`)
    const [ data, loading ] = useFetch(`${URL_API}/service/all`)

    return loading | loadingAbout ? (
        <Loader />
    ) : dataAbout.data && ( 
        <div className="overflow-x-hidden">
            <header id="header">
                <NavTop />
                <NavBottom />
            </header>

            <main className="content">
            <BreadCrumb {...{
                    img:"/header.webp",
                    title: "About Us",
                    links: [{key: "",val:"About Us"}],
                    desc: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. In repudiandae asperiores iure animi. Tenetur numquam sit facere consequuntur officia dolore commodi quod maiores sapiente voluptatum explicabo amet, est earum eveniet.",
                }} />
                <ImageTextBox 
                    img="/assessment.webp"
                    section={<TextSection data={dataAbout} />}
                />
                <Counter data={dataAbout} />
                <Service data={data} />
            </main>

            <Partner className='lg:mt-[100px] sm:mt-16 mt-10' /> 

            <footer id="footer">
                <Footer />
            </footer>
        </div>
    )
}

export default page