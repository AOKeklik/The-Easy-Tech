"use client"

import React, { useEffect, useState } from 'react'

import NavBottom from '@/components/Header/NavBottom/NavBottom'
import NavTop from '@/components/Header/NavTop/NavTop'
import Partner from '@/components/Partner/Partner'
import Footer from '@/components/Footer/Footer';
import BreadCrumb from '@/components/BreadCrumb/BreadCrumb'
import SectionText from './SectionText/SectionText'
import ImageTextBox from '@/components/ImageTextBox/ImageTextBox'
import Service from '@/components/Service/Service'
import Loader from '@/components/Loader/Loader'

import services from "@/data/service.json"

const page = () => {
    const [data, setData] = useState([])
    const [loading, setLoading] = useState(true)

    useEffect(() => {
        const timer = setTimeout(() => {
            setData(services)
            setLoading(false)
        }, 1000)

        return () => clearTimeout(timer)
    }, [])

    return loading ? (
        <Loader /> 
    ) : (
        <div className="overflow-x-hidden">
            <header id="header">
                <NavTop />
                <NavBottom />
            </header>


            <main className="content">
            <BreadCrumb {...{
                    img:"/header.webp",
                    title: "Lorem ipsum dolor sit amet.",
                    links: [{key: "",val:"Our Services"}],
                    desc: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. In repudiandae asperiores iure animi. Tenetur numquam sit facere consequuntur officia dolore commodi quod maiores sapiente voluptatum explicabo amet, est earum eveniet.",
                }} />

                <ImageTextBox 
                    img="/gateway1.webp"
                    section={<SectionText />}
                    direction='left'
                />

                <Service services={data} />
            </main>

            <Partner className='lg:mt-[100px] sm:mt-16 mt-10' /> 

            <footer id="footer">
                <Footer />
            </footer>
        </div>
    )
};

export default page;