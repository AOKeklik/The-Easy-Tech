"use client"

import React from 'react'
import Image from 'next/image'
import { useRouter } from 'next/router'

import NavBottom from '@/components/Header/NavBottom/NavBottom'
import NavTop from '@/components/Header/NavTop/NavTop'
import Partner from '@/components/Partner/Partner'
import Footer from '@/components/Footer/Footer';
import BreadCrumb from '@/components/BreadCrumb/BreadCrumb'
import SideMenuSection from '@/components/Sections/service/SideMenuSection'
import Loader from '@/components/Loader/Loader'
import Service from '@/components/Service/Service'

import useFetch from "@/hooks/useFetch"
import { URL_API, URL_IMG } from '@/config/config'

const page = ({ params }) => {
    const { id, slug } = params

    const [ dataServices, loadingServices ] = useFetch(`${URL_API}/service/all`)
    const [ dataService, loadingService ] = useFetch(`${URL_API}/service/${id}/${slug}`)

    return loadingServices || loadingService ? (
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
                title: "Our Services Detail",
                links: [{key: "/service",val:"Our Services"}, {key: "",val:"Service"}],
                desc: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. In repudiandae asperiores iure animi. Tenetur numquam sit facere consequuntur officia dolore commodi quod maiores sapiente voluptatum explicabo amet, est earum eveniet.",
            }} />

                <div className='content-detail-block lg:py-[100px] sm:py-16 py-10'>
                    <div className='container'>
                        <div className='flex max-xl:flex-col gap-y-8'>
                            <div className='w-full xl:w-3/4'>
                                <div className='w-full xl:pr-[80px]'>
                                    <div className='heading3'>{dataService.data.title}</div>
                                    <div className='bg-img mt-5 mb-5'>
                                        <Image width={5000} height={5000} className='w-full h-full rounded-xl' src={`${URL_IMG}/service/${dataService.data.image}`} alt={dataService.data.title} /> 
                                    </div>
                                    <div className='body2 text-secondary mt-4'>{dataService.data.desc}</div> 
                                </div>
                            </div>
                            <SideMenuSection data={dataServices} />
                        </div> 
                    </div> 
                </div>

                <Service data={dataServices} />
            </main>

            <Partner className='lg:mt-[100px] sm:mt-16 mt-10' /> 

            <footer id="footer">
                <Footer />
            </footer>
        </div>
    )
};

export default page;