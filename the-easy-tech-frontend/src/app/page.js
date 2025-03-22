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

import services from "@/data/service.json"
import casestudies from "@/data/case-study.json"
import posts from "@/data/blog.json"
import Footer from "@/components/Footer/Footer"

export default function Home() {
    return (
        <div>
            <header id="header">
                <NavTop />
                <NavBottom />
            </header>

            <main className="content">
                <Slider />
                <Service services={services} />
                <PaymentGateway />
                <CaseStudy casestudies={casestudies} />
                <PaymentGatewayService />
                <FormRequest />
                <Testimonials />
                <Blog posts={posts} />
            </main>

            <Partner />

            <footer id="footer">
                <Footer />
            </footer>
        </div>
    )
}
