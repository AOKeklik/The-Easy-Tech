"use client"
import React from 'react' 

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
import useFetch from "@/hooks/useFetch"
import { URL_API } from '@/config/config'

export default function Home() {
    const [ dataSlider, loadingSlider ] = useFetch(`${URL_API}/slider/all`)
    const [ dataService, loadingService ] = useFetch(`${URL_API}/service/all`)
    const [ dataGatewayone, loadingGatewayone ] = useFetch(`${URL_API}/gatewayone`)
    const [ dataCaseStudy, loadingCaseStudy ] = useFetch(`${URL_API}/case-study/all`)
    const [ dataGatewaytwo, loadingGatewaytwo ] = useFetch(`${URL_API}/gatewaytwo`)
    const [ dataTestimonial, loadingTestimonial ] = useFetch(`${URL_API}/testimonial/all`)
    const [ dataBlog, loadingBlog ] = useFetch(`${URL_API}/blog/all`)



    return loadingSlider || loadingService || loadingGatewayone || loadingCaseStudy || loadingGatewaytwo || loadingTestimonial || loadingBlog ? (
        <Loader />
    ) : (
        <div className="overflow-x-hidden">
            <header id="header">
                <NavTop />
                <NavBottom />
            </header>

            <main className="content">
                <Slider data={dataSlider} />
                <Service data={dataService} />
                <PaymentGateway data={dataGatewayone} />
                <CaseStudy data={dataCaseStudy} />
                <PaymentGatewayService data={dataGatewaytwo} />
                <FormRequest />
                <Testimonials data={dataTestimonial} />
                <Blog data={dataBlog} />
            </main>

            <Partner className='lg:mt-[100px] sm:mt-16 mt-10' />

            <footer id="footer">
                <Footer />
            </footer>
        </div>
    )
}
