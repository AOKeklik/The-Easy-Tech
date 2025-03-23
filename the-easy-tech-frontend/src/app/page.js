"use client"
import React, { useEffect, useState } from 'react' 

import CaseStudy from "@/components/CaseStudy/CaseStudy"
import NavBottom from "@/components/Header/NavBottom/NavBottom"
import NavTop from "@/components/Header/NavTop/NavTop"
import PaymentGateway from "@/components/PaymentGateway/PaymentGateway"
import Service from "@/components/Service/Service"
import Slider from "@/components/Slider/Slider"

import PaymentGatewayService from "@/components/PaymentGatewayService/PaymentGatewayService"
import FormRequest from "@/components/FormRequest/FormRequest"
import Testimonials from "@/components/Testimonial/Testimonial"
import Blog from "@/components/Blog/Blog"
import Partner from "@/components/Partner/Partner"
import Footer from "@/components/Footer/Footer"
import Loader from '@/components/Loader/Loader'

import services from "@/data/service.json"
import casestudies from "@/data/case-study.json"
import posts from "@/data/blog.json"

export default function Home() {
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
                <Slider />
                <Service services={data} />
                <PaymentGateway />
                <CaseStudy casestudies={casestudies} />
                <PaymentGatewayService />
                <FormRequest />
                <Testimonials />
                <Blog posts={posts} />
            </main>

            <Partner className='lg:mt-[100px] sm:mt-16 mt-10' />

            <footer id="footer">
                <Footer />
            </footer>
        </div>
    )
}
