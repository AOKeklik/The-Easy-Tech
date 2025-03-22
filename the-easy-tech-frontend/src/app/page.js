import NavBottom from "@/components/Header/NavBottom/NavBottom";
import NavTop from "@/components/Header/NavTop/NavTop";
import Slider from "@/components/Slider/Slider";

export default function Home() {
    return (
        <div>
            <header id="header">
                <NavTop />
                <NavBottom />
            </header>

            <main className="content">
                <Slider />
            </main>
        </div>
    );
}
